<?php

namespace src\Interfaces;

/**
 * Post interface
 */
interface PostInterface {

    /**
     * Set author
     *
     * @param UserInterface $author
     * @return PostInterface
     */
    public function setAuthor(UserInterface $author): PostInterface;

    /**
     * Get author
     *
     * @return UserInterface
     */
    public function getAuthor() : UserInterface;

}