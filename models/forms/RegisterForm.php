<?php

namespace app\models\forms;

use app\dto\UserDto;
use app\models\User;
use Yii;
use yii\base\Model;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * Class RegisterForm
 * @package app\models\forms
 */
class RegisterForm extends Model
{
    /**
     * @var string $firstName
     */
    public $firstName;
    /**
     * @var string $lastName
     */
    public $lastName;
    /**
     * @var integer $gender
     */
    public $gender;

    public $birthDay;
    /**
     * @var string $phone
     */
    public $phone;
    /**
     * @var string $email
     */
    public $email;
    /**
     * @var boolean $ua
     */
    public $ua;

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'firstName' => Yii::t('app', 'First Name'),
            'lastName' => Yii::t('app', 'Last Name'),
            'gender' => Yii::t('app', 'Gender'),
            'birthDay' => Yii::t('app', 'Birth Day'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'ua' => Yii::t('app', 'User agreement'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['firstName', 'lastName', 'gender', 'birthDay', 'phone', 'email'],
                'required'
            ],
            [['firstName', 'lastName', 'phone', 'email'], 'string'],
            ['phone', PhoneInputValidator::class],
            ['gender', 'integer'],
            ['ua', 'boolean'],
            [
                'ua',
                'required',
                'requiredValue' => true,
                'message' => Yii::t('app', 'Before registering, you must agree to the user agreement')
            ],
            ['birthDay', 'date', 'format' => 'Y-m-d'],
            ['phone', 'unique', 'targetAttribute' => 'phone', 'targetClass' => User::className()],
            ['email', 'unique', 'targetAttribute' => 'email', 'targetClass' => User::className()],
            ['gender', 'in', 'range' => array_keys(User::GENDERS)]
        ];
    }

    /**
     * @return UserDto
     */
    public function getDto(): UserDto
    {
        return new UserDto(
            null,
            $this->firstName,
            $this->lastName,
            $this->gender,
            $this->birthDay,
            $this->phone,
            $this->email
        );
    }

}
