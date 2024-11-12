<?php

namespace doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Phone
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public int $id;

    public function __construct(
        #[Column]
        public readonly string $number
    ) {
    }

}