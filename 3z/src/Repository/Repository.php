<?php

namespace src\Repository;

use src\Interfaces\SourceInterface;

class Repository {
    
    private $source;

    public function __construct(SourceInterface $source) {}

}