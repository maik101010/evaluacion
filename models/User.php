<?php
namespace app\models;
class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '74191f2b7fb6da7e60be',
        ]
    ];
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }
        return null;
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }
        return null;
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
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
}

// <?php

// namespace app\models;
// use yii\db\ActiveRecord;
// use yii\web\IdentityInterface;


// class User extends ActiveRecord implements IdentityInterface
// {
//     public static function tableName()
//     {
//         return 'user';
//     }

//     // public function init()
//     // {
//     //     parent::init();
//     //     \Yii::$app->user->enableSession = false;
//     // }

//     public function rules()
//     {
//         return [
//             [['username', 'password'], 'required']
    
//         ];
//     }

  







    
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