<?php

namespace frontend\controllers;

use frontend\models\Contact;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;

class ContactController extends BaseController
{

    public function actionIndex()
    {
        $model = new Contact;
        
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Cảm ơn bạn đã phản hồi!');
                $model = new Contact;
            } else {
                Yii::$app->session->setFlash('error', 'Chưa gửi được, bạn vui lòng kiểm tra lại thông tin!');
            }
            
        }
        
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreateWithEmail()
    {
        if (!Yii::$app->request->isPost) {
            throw new BadRequestHttpException;
        }
        $model = new Contact;
        $model->email = Yii::$app->request->post('email', '');
        $model->message = '';
        
        if ($model->save()) {
            return 1;
        }
        
        return 0;
    }
}
