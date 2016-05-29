<?php
namespace backend\controllers;

use yii\web\Controller;

/**
 * Base controller
 */
class BaseController extends Controller {
    public $gallery_id, $product_id;
    public function init() {
        parent::init();
    }
}
