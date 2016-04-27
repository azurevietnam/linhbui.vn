<?php

namespace frontend\controllers;

class GalleryController extends BaseController
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
