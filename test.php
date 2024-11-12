<?php

require_once 'vendor/autoload.php';

use doctrine\Helper\EntityManagerCreator;


$entityManager = EntityManagerCreator::createEntityManager();

var_dump($entityManager);
