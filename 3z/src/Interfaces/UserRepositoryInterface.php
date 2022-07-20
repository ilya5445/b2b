<?php

namespace src\Interfaces;

use src\Interfaces\UserInterface;

interface UserRepositoryInterface {

    /**
     * Поиск пользователя по ID
     *
     * @param integer $user_id
     * @return UserInterface
     */
    public function findById(int $user_id): UserInterface; 
}