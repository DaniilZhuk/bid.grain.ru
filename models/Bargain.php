<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Bargain".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_response
 * @property string $price
 * @property int $status
 * @property int $id_sender
 * @property string $comment
 */
class Bargain extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bargain';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'price'], 'required'],
            [['comment', 'price'], 'string', 'max' => 255],
            [['id_user', 'id_sender', 'status', 'id_response'], 'integer'],
            [['comment'], 'default', 'value' => ''],
            [['status'], 'default', 'value' => 0]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            
            'id_user' => \Yii::t('app', 'Id user'),
            'id_response' =>  \Yii::t('app', 'Id response'),
            'price' => \Yii::t('app', 'Price'),
            'status'=> \Yii::t('app', 'Status'),
            'id_sender' => \Yii::t('app', 'Id sender'),
            'comment' => \Yii::t('app', 'Comments') ,
            
        ];
    }
    
   
}
