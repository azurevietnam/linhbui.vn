<?php
namespace backend\controllers;

use common\utils\FileUtils;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\UploadedFile;

/* 
 * File controller
 */
class FileController extends Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }
    public function actionCkeditorUploadImage() {
        $uploadedFile = UploadedFile::getInstanceByName('upload');
        $filename = $uploadedFile->baseName;
        foreach (FileUtils::$file_name_replace as $search => $replace){
            $filename = str_replace(html_entity_decode($search), $replace, $filename);
        }
        if (trim($filename) == ''){
            $filename = 'Untitle';
        }
        $filename .= '.' . $uploadedFile->extension;
        $prefix = '';
        
        do {
            $targetUrl = Yii::$app->params['uploads_url'] . '/' . $prefix . $filename;
            $targetPath = Yii::$app->params['uploads_folder'] . '/' . $prefix . $filename;
            $prefix .= ' ';
        } while (is_file($targetPath));
        
        if ($uploadedFile === null || $uploadedFile->size === 0 || $uploadedFile->tempName === '') {
            $message = 'Không có ảnh nào được tải lên.';
        } else if (!in_array(strtolower($uploadedFile->extension), FileUtils::$allow_extensions)) {
            $message = 'Ảnh không đúng định dạng (' . implode(', ', FileUtils::$allow_extensions) . ').';
        } else {
            if (!is_dir(Yii::$app->params['uploads_folder'])){
                mkdir(Yii::$app->params['uploads_folder'], 0755, true);
            }
            if (!$uploadedFile->saveAs($targetPath)) {
                $message = 'Không lưu được ảnh. Vui lòng thử lại!';
            } else {
                $message = 'Tải lên thành công!';
            }
        }
        $funcNum = Yii::$app->request->get('CKEditorFuncNum');
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$targetUrl', '$message');</script>";
    }
}

