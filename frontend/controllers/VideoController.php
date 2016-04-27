<?php

namespace frontend\controllers;

class VideoController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionViewAll()
    {
        return $this->render('view-all');
    }
}
