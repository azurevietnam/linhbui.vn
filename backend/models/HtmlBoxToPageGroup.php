<?php

namespace backend\models;

use common\utils\FileUtils;
use Yii;

/**
 * This is the model class for table "html_box_to_page_group".
 *
 * @property integer $id
 * @property integer $html_box_id
 * @property integer $page_group_id
 *
 * @property PageGroup $pageGroup
 * @property HtmlBox $htmlBox
 */
class HtmlBoxToPageGroup extends \yii\db\ActiveRecord
{

    /**
    * function ::create ($data)
    */
    public static function create ($data)
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;  
        $model = new HtmlBoxToPageGroup();
        if($model->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Create';
                $log->object_class = 'HtmlBoxToPageGroup';
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
                $log->object_class = 'HtmlBoxToPageGroup';
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
            $log->object_class = 'HtmlBoxToPageGroup';
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
        return 'html_box_to_page_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['html_box_id', 'page_group_id'], 'required'],
            [['html_box_id', 'page_group_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'html_box_id' => 'Html Box ID',
            'page_group_id' => 'Page Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageGroup()
    {
        return $this->hasOne(PageGroup::className(), ['id' => 'page_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHtmlBox()
    {
        return $this->hasOne(HtmlBox::className(), ['id' => 'html_box_id']);
    }
}
