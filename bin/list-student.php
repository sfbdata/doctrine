<?php

use doctrine\Entity\Course;
use doctrine\Entity\Phone;
use doctrine\Entity\Student;
use doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();


foreach ($studentList as $student){
    echo"ID: $student->id\nNome: $student->name";


    if($student->phones()->count() > 0) {
        echo PHP_EOL;
        echo "Telefone: ";
        echo implode(', ', $student->phones()
            ->map(fn (Phone $phone) => $phone->number)
            ->toArray());
    }

    if ($student->courses()->count() > 0) {
        echo PHP_EOL;
        echo "Course: ";
        echo implode(', ', $student->courses()
            ->map(fn(Course $course) => $course->name)
            ->toArray());
    }

    echo PHP_EOL . PHP_EOL;
}


$count = $studentRepository->count([]);
echo "Total de alunos: $count" . PHP_EOL;