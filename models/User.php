<?php

namespace app\models;

use app\models\UserSearch;
use app\models\Bid;
use app\models\Response;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $is_admin
 * @property bool $agent
 * @property string $fio
 * @property string $inn
 * @property string $company_name
 * @property string $mail
 * @property string $tel
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 */
class User extends ActiveRecord  implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'company_name', 'mail', 'tel', 'username', 'password'], 'required'],
            [['fio','inn', 'company_name', 'mail', 'tel', 'username', 'agent', 'password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['is_admin'], 'integer'],
            [['authKey', 'accessToken','inn', 'is_admin'], 'default', 'value' => '0'],
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
            'is_admin' => 'Админ? ',
            'fio' => \Yii::t('app', 'Full name'),
            'inn' => \Yii::t('app', 'Taxpayer Identification Number'),
            'company_name' => \Yii::t('app', 'Company'),
            'mail' => \Yii::t('app', 'E-mail'),
            'tel' => \Yii::t('app', 'Telephone'),
            'agent'=> \Yii::t('app', 'User group'),
            'username' => \Yii::t('app', 'User name'),
            'password' => \Yii::t('app', 'Password'),
            'authKey' => 'Auth Key ',
            'accessToken' => 'Access Token ',
        ];
    }
    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * Generate auth key
     */
    public function generateAuthKey()
    {
        $this->authKey = \Yii::$app->security->generateRandomString();
    }
    public function getAdmin()
    {
        return $this->is_admin;
    }
}
