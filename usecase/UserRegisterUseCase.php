<?php

namespace app\usecase;

use app\jobs\SendEmailJob;
use Yii;
use app\dto\UserDto;
use app\models\User;
use app\repository\UserRepository;

class UserRegisterUseCase
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserRegisterUseCase constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserDto $userDto
     * @return bool
     * @throws \Throwable
     * @throws \yii\base\Exception
     */
    public function register(UserDto $userDto): bool
    {
        $password = Yii::$app->getSecurity()->generateRandomString(User::PASSWORD_LENGTH);

        $userDto->setPasswordHash(Yii::$app->getSecurity()->generatePasswordHash($password));

        $model = User::create($userDto);


        if ($this->userRepository->insert($model)) {
            Yii::$app->queue->push(new SendEmailJob([
                'email' => $userDto->getEmail(),
                'password' => $password
            ]));
            return true;
        }

        return false;
    }
}