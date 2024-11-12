<?php

use doctrine\Entity\Student;
use doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student){
    echo"ID: $student->id\nNome: $student->name\n\n";
}


$count = $studentRepository->count([]);
echo "Total de alunos: $count" . PHP_EOL;