<?php

namespace src\Repository;

use src\Repository\Repository;
use src\Interfaces\UserInterface;
use src\Interfaces\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface {

    /**
     * Поиск пользователя по ID
     *
     * @param integer $user_id
     * @return UserInterface
     */
    public function findById(int $user_id): UserInterface {}

}