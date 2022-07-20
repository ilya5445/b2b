<?php

namespace src\Models;

use src\Interfaces\UserInterface;

class UserModel implements UserInterface {
    
    protected $name;

    public function __construct(string $name) {}

    /**
     * Get the value of name
     */ 
    public function getName(): string {}

    /**
     * Set the value of name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name) {}

}