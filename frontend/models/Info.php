<?php
namespace frontend\models;

use yii\helpers\Url;

class Info extends \common\models\Info {
    //put your code here
    public static function getInfoByType($type)
    {
        if (!$model = static::find()->where(['type' => $type])->andWhere(['is_active' => 1])->orderBy('id desc')->one()) {
            $model = new Info();
        }
        return $model;
    }

    /**
     * function ->getLink ()
     */
    public $_link;

    public function getLink() {
        if ($this->_link === null) {
            $_link = '';
            $_link = Url::to(['info/index', 'slug' => $this->slug], true);
            $this->_link = $_link;
        }
        return $this->_link;
    }
}
