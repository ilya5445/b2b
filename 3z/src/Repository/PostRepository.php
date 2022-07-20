<?php

namespace src\Repository;

use src\Repository\Repository;
use src\Interfaces\UserInterface;
use src\Interfaces\PostInterface;
use src\Interfaces\PostRepositoryInterface;

class PostRepository extends Repository implements PostRepositoryInterface {

    /**
     * Поиск статей по ID пользователя
     *
     * @param integer $user_id
     * @return PostInterface
     */
    public function findByUserId(int $user_id): PostInterface {}

    /**
     * Создание поста пользователем
     *
     * @param UserInterface $user
     * @param PostInterface $post
     * @return boolean
     */
    public function createByUser(UserInterface $user, PostInterface $post): bool {}

}