<?php

use doctrine\Entity\Student;
use doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = $entityManager->find(Student::class, $argv[1]);
$student->name = $argv[2];

$entityManager->persist($student);
$entityManager->flush();
