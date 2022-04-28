<?php

namespace app\models;
use yii\base\Model;

class SignupForm extends Model{
 

    public $fio;
    public $is_admin;
    public $inn;
    public $company_name;
    public $mail;
    public $tel;
    public $username;
    public $password;
    public $agent;
    public $authKey;
    public $accessToken;
 
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'company_name', 'mail', 'tel', 'username', 'password'], 'required'],
            [['fio','inn', 'company_name', 'mail', 'tel', 'username', 'password', 'agent', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['is_admin'], 'integer'],
            // [['agent'], 'boolean'],
            [['authKey', 'accessToken', 'is_admin' ], 'default', 'value' => '0'],
            // [['agent' ], 'default', 'value' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => \Yii::t('app', 'Full name'),
            'agent'=> \Yii::t('app', 'User group'),
            'inn' => \Yii::t('app', 'Taxpayer Identification Number'),
            'company_name'=> \Yii::t('app', 'Company'),
            'mail' => \Yii::t('app', 'E-mail'),
            'tel' => \Yii::t('app', 'Telephone'),
            'username' => \Yii::t('app', 'User name'),
            'password' => \Yii::t('app', 'Password'),

        ];
    }
 
}