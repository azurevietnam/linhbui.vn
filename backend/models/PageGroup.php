<?php

namespace backend\models;

use common\utils\FileUtils;
use Yii;

/**
 * This is the model class for table "page_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $route
 * @property string $url_regexp
 *
 * @property HtmlBox[] $htmlBoxes
 * @property HtmlBoxToPageGroup[] $htmlBoxToPageGroups
 * @property SeoInfo[] $seoInfos
 * @property SeoInfoToPageGroup[] $seoInfoToPageGroups
 * @property WidgetToPageGroup[] $widgetToPageGroups
 */
class PageGroup extends \common\models\PageGroup
{

    /**
    * function ::create ($data)
    */
    public static function create ($data)
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;  
        $model = new PageGroup();
        if($model->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Create';
                $log->object_class = 'PageGroup';
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
            if ($model->save()) {
                if ($log) {
                    $log->object_pk = $model->id;
                    $log->is_success = 1;
                    $log->save();
                }
                return $model;
            }
            $model->getErrors();
            return $model;
        }
        return false;
    }
    
    /**
    * function ->update2 ($data)
    */
    public function update2 ($data)
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;   
        if ($this->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Update';
                $log->object_class = 'PageGroup';
                $log->object_pk = $this->id;
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
            
            if ($this->save()) {
                if ($log) {
                    $log->is_success = 1;
                    $log->save();
                }
                return true;
            }
            return false;
        }
        return false;
    }
    
    /**
    * function ->delete ()
    */
    public function delete ()
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;    
        $model = $this;
        if ($log = new UserLog()) {
            $log->username = $username;
            $log->action = 'Delete';
            $log->object_class = 'PageGroup';
            $log->object_pk = $model->id;
            $log->created_at = $now;
            $log->is_success = 0;
            $log->save();
        }
        if(parent::delete()) {
            if ($log) {
                $log->is_success = 1;
                $log->save();
            }
            return true;
        }
        return false;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'route'], 'string', 'max' => 255],
            [['url_regexp'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'route' => 'Route',
            'url_regexp' => 'Url Regexp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHtmlBoxes()
    {
        return $this->hasMany(HtmlBox::className(), ['page_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHtmlBoxToPageGroups()
    {
        return $this->hasMany(HtmlBoxToPageGroup::className(), ['page_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeoInfos()
    {
        return $this->hasMany(SeoInfo::className(), ['page_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeoInfoToPageGroups()
    {
        return $this->hasMany(SeoInfoToPageGroup::className(), ['page_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgetToPageGroups()
    {
        return $this->hasMany(WidgetToPageGroup::className(), ['page_group_id' => 'id']);
    }
}
