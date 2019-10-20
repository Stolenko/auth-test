<?php

namespace app\repository;

use app\models\User;

/**
 * Class UserRepository
 * @package app\repository
 */
class UserRepository
{
    /**
     * @param int $id
     * @return User|null
     */
    public function get(int $id): ?User
    {
        return User::findOne($id);
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return User::findOne(['email' => $email]);
    }

    /**
     * @param User $user
     * @param bool $runValidation
     * @return User|null
     * @throws \Throwable
     */
    public function insert(User $user, bool $runValidation = true): ?User
    {
        if (!$user->insert($runValidation)) {
            return null;
        }
        return $user;
    }

}