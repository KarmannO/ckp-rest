<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $first_name
 * @property string $middle_name
 * @property string $second_name
 * @property integer $degree
 * @property integer $position
 * @property integer $rank
 * @property string $phone
 *
 * @property Degree $userDegree
 * @property Position $userPosition
 * @property Rank $userRank
 * @property Organization $userOrganization
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'role', 'created_at', 'updated_at', 'first_name', 'middle_name', 'second_name', 'degree', 'position', 'rank', 'organization'], 'required'],
            [['role', 'created_at', 'updated_at', 'degree', 'position', 'rank', 'organization'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'first_name', 'middle_name', 'second_name'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 32],
            [['degree'], 'exist', 'skipOnError' => true, 'targetClass' => Degree::className(), 'targetAttribute' => ['degree' => 'id']],
            [['position'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position' => 'id']],
            [['rank'], 'exist', 'skipOnError' => true, 'targetClass' => Rank::className(), 'targetAttribute' => ['rank' => 'id']],
            [['organization'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'username' => 'Имя пользователя',
            'auth_key' => 'Ключ авторизации',
            'password_hash' => 'Хеш пароля',
            'password_reset_token' => 'Токен для восстановления пароля',
            'role' => 'Роль',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлён',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'second_name' => 'Фамилия',
            'degree' => 'Degree',
            'position' => 'Position',
            'rank' => 'Rank',
            'phone' => 'Телефон'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDegree()
    {
        return $this->hasOne(Degree::className(), ['id' => 'degree']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position']);
    }

    public function getUserOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRank()
    {
        return $this->hasOne(Rank::className(), ['id' => 'rank']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
