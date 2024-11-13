<?php

use doctrine\Entity\Phone;
use doctrine\Entity\Student;
use doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student($argv[1]);
$student->addPhones(new Phone('(61)99999-9999'));
$student->addPhones(new Phone('(61)99999-2222'));
$entityManager->persist($student);

$entityManager->flush();
