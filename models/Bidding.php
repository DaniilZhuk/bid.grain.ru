<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bidding".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_admin
 * @property int $id_bid
 * @property int $id_response
 * @property string $user_price
 * @property string $admin_price
 * @property string $comment
 */
class Bidding extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bidding';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_price', 'admin_price'], 'required'],
            [['user_price', 'admin_price', 'comment'], 'string', 'max' => 255],
            [['id_user', 'id_admin', 'id_bid' ,'status', 'id_response'], 'integer'],
            [['comment'], 'default', 'value' => '']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_price' => \Yii::t('app', 'User price'),
            'admin_price' => \Yii::t('app', 'Admin price'),
            'id_user' => \Yii::t('app', 'id_user'),
            'id_admin' =>  \Yii::t('app', 'id_admin'),
            'id_bid' =>  \Yii::t('app', 'id_bid'),
            'id_response' =>  \Yii::t('app', 'id_response'),
            'comment' => \Yii::t('app', 'Comments') ,
            'status'=> \Yii::t('app', 'Status'),
        ];
    }
    
   
}
