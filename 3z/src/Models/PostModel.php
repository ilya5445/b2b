<?php

namespace src\Models;

use src\Interfaces\{PostInterface, UserInterface};

class PostModel implements PostInterface {

    protected $title;
    protected $author;

    /**
     * @param string $title
     */
    public function __construct(string $title) {}

    /**
     * Set author
     *
     * @param UserInterface $author
     * @return PostInterface
     */
    public function setAuthor(UserInterface $author): PostInterface {}

    /**
     * Get author
     *
     * @return UserInterface
     */
    public function getAuthor() : UserInterface {}

}