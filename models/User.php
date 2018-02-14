<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required']
    
        ];
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    // public function rules()
    // {
    //     return [
    //         [['profesion'], 'string', 'max' => 40],
    //     ];
    // }


    // /**
    //  * Finds an identity by the given ID.
    //  *
    //  * @param string|int $id the ID to be looked for
    //  * @return IdentityInterface|null the identity object that matches the given ID.
    //  */
    // public static function findIdentity($id)
    // {
    //     return static::findOne($id);
    // }

    // /**
    //  * Finds an identity by the given token.
    //  *
    //  * @param string $token the token to be looked for
    //  * @return IdentityInterface|null the identity object that matches the given token.
    //  */
    // public static function findIdentityByAccessToken($token, $type = null)
    // {
    //     return static::findOne(['access_token' => $token]);
    // }

    // /**
    //  * @return int|string current user ID
    //  */
    // public function getId()
    // {
    //     return $this->id;
    // }

    // /**
    //  * @return string current user auth key
    //  */
    // public function getAuthKey()
    // {
    //     return $this->authkey;
    // }

    // /**
    //  * @param string $authKey
    //  * @return bool if auth key is valid for current user
    //  */
    // public function validateAuthKey($authKey)
    // {
    //     return $this->getAuthKey() === $authKey;
    // }
    
    // public function beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert)) {
    //         if ($this->isNewRecord) {
    //             $this->auth_key = \Yii::$app->security->generateRandomString();
    //         }
    //         return true;
    //     }
    //     return false;
    // }
}