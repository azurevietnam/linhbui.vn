<?php
namespace backend\controllers;

use Yii;
use yii\helpers\Inflector;
use yii\web\Controller;

/**
 * Base controller
 */
class BaseController extends Controller {
    public $gallery_id, $product_id;
    public function init() {
        parent::init();
    }
    public function beforeAction($action) {
        parent::beforeAction($action);
        
        Yii::$app->session->set('uploaded_filenames', []);
        Yii::$app->session->set('model_name', Inflector::id2camel(Yii::$app->controller->id));
        Yii::$app->session->set('model_id', Yii::$app->request->get('id', ''));
        
        return true;
    }
}
