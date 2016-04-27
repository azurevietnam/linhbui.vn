<?php

namespace frontend\controllers;

use frontend\models\Info;
use frontend\models\Redirect;

class InfoController extends BaseController
{
    public function actionIndex($slug)
    {
        if ($model = Info::find()->where(['is_active' => 1])->andWhere(['slug' => $slug])->one()) {
            $this->link_canonical = $model->getLink();
            if (!Redirect::compareUrl($this->link_canonical)) {
                $this->redirect($this->link_canonical);
            }
            $this->breadcrumbs[] = ['label' => $model->name, 'url' => $this->link_canonical];
            if (!$this->seo_exist) {
                $this->page_title = $model->page_title;
                $this->h1 = $model->h1;
                $this->meta_title = $model->meta_title;
                $this->meta_description = $model->meta_description;
                $this->meta_keywords = $model->meta_keywords;
                $this->long_description = $model->long_description;
            }
            if (!$this->seo_image_exist) {
                $this->meta_image = $model->getImage();
            }
            
            return $this->render('index', ['model' => $model]);
        } else {
            Redirect::go();
        }
    }

}
