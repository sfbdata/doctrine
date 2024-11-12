<?php

use doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManage = EntityManagerCreator::createEntityManager();

$student = $entityManage->getReference(\doctrine\Entity\Student::class, $argv[1]);

$entityManage->remove($student);
$entityManage->flush();