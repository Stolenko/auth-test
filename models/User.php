<?php

namespace app\models;

use app\dto\UserDto;
use app\repository\UserRepository;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User
 * @package app\models
 * @property int $id [int(11)]
 * @property string $first_name [varchar(64)]
 * @property string $last_name [varchar(64)]
 * @property int $gender [smallint(6)]
 * @property string $birth_at [datetime]
 * @property string $phone [varchar(16)]
 * @property string $email [varchar(255)]
 * @property string $password_hash [varchar(255)]
 * @property string $created_at [datetime]
 * @property string $updated_at [datetime]
 */
class User extends ActiveRecord implements IdentityInterface
{
    const PASSWORD_LENGTH = 16;

    const GENDER_MAN = 10;
    const GENDER_WOMAN = 20;

    const GENDERS = [
        self::GENDER_MAN => 'Man',
        self::GENDER_WOMAN => 'Woman',
    ];

    public function rules(): array
    {
        return [
            [['first_name', 'last_name', 'gender', 'birth_at', 'phone', 'email'], 'required'],
            [['first_name', 'last_name', 'phone', 'email'], 'string'],
            [['birth_at'], 'date', 'format' => 'Y-m-d'],
            ['email', 'email'],
            [['phone', 'email'], 'unique'],
            ['gender', 'in', 'range' => array_keys(self::GENDERS)]
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'gender' => Yii::t('app', 'Gender'),
            'birth_at' => Yii::t('app', 'Birth At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    /**
     * @param int|string $id
     * @return null|IdentityInterface
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public static function findIdentity($id): ?IdentityInterface
    {
        /** @var UserRepository $userRepository */
        $userRepository = Yii::$container->get(UserRepository::class);
        return $userRepository->get($id);
    }

    /**
     * @param string $email
     * @return User|null
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public static function findByEmail(string $email): ?User
    {
        /** @var UserRepository $userRepository */
        $userRepository = Yii::$container->get(UserRepository::class);
        return $userRepository->findByEmail($email);
    }


    /**
     * @param string $password
     * @return bool
     */
    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * @param mixed $token
     * @param null $type
     * @return null|void|IdentityInterface
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|void
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * @param string $authKey
     * @return bool|void
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    /**
     * @param UserDto $userDto
     * @return User
     */
    public static function create(UserDto $userDto): User
    {
        return new static([
            'first_name' => $userDto->getFirstName(),
            'last_name' => $userDto->getLastName(),
            'gender' => $userDto->getGender(),
            'birth_at' => $userDto->getBirthAt(),
            'phone' => $userDto->getPhone(),
            'email' => $userDto->getEmail(),
            'password_hash' => $userDto->getPasswordHash()
        ]);
    }
}
