<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $address
 */
class Contact extends \yii\db\ActiveRecord
{
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            [['name', 'email', 'phone_number', 'address'], 'string', 'max' => 255],
            ['message', 'string', 'max' => 2023],
//            ['verifyCode', 'captcha', 'on' => 'index'],
            [['email', 'message'], 'unique', 'targetAttribute' => ['email', 'message']],
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
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'address' => 'Address',
            'message' => 'Nội dung',
            'verifyCode' => 'Mã xác thực',
        ];
    }
}
