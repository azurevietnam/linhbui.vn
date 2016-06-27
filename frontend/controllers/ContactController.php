<?php

namespace frontend\controllers;

use frontend\models\Contact;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class ContactController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateWithEmail()
    {
        if (!Yii::$app->request->isPost) {
            throw new BadRequestHttpException;
        }
        $model = new Contact;
        $model->email = Yii::$app->request->post('email', '');
        if ($model->save()) {
            
            return 1;
        }
        
        return 0;
    }
}
