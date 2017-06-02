<?php
/**
 * Created by PhpStorm.
 * User: zenbu
 * Date: 01.06.2017
 * Time: 14:52
 */

namespace app\models\forms;


use app\models\User;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $first_name;
    public $middle_name;
    public $second_name;
    public $phone;

    public $degree;
    public $rank;
    public $position;
    public $organization;

    public function rules()
    {
        return [
            ['username', 'email'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Пользователь с таким адресом уже существует.'],
            [
                [
                    'username',
                    'first_name',
                    'middle_name',
                    'second_name',
                    'phone',
                    'degree',
                    'rank',
                    'position',
                    'organization'
                ],
                'required'
            ],
            [['organization', 'degree', 'rank', 'position'], 'default'],
            [['first_name', 'middle_name', 'second_name'], 'string', 'max' => 255]
        ];
    }
    public function attributeLabels()
    {
        return [
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'second_name' => 'Фамилия',
            'username' => 'Адрес электронной почты',
            'phone' => 'Телефон',
            'organization' => 'Организация',
            'position' => 'Должность',
            'degree' => 'Учёная степень',
            'rank' => 'Учёное звание'
        ];
    }


    public function formName()
    {
        return 'signup-form';
    }

    public function signup()
    {
        if(!$this->validate())
            return null;

        $user = new User();
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->middle_name = $this->middle_name;
        $user->second_name = $this->second_name;
        $user->phone = $this->phone;
        $user->degree = $this->degree;
        $user->rank = $this->rank;
        $user->organization = $this->organization;
        $user->position = $this->position;
        $user->auth_key = '';
        $temporary_pass = \Yii::$app->security->generateRandomString(10);
        $user->password_hash = \Yii::$app->security->generatePasswordHash($temporary_pass);
        $user->role = 1;
        $user->created_at = strtotime("now");
        $user->updated_at = strtotime("now");

        return $user->save();
    }
}