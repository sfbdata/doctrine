<?php

namespace doctrine\Repository;

use doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;

class DoctrineStudentRepository extends EntityRepository
{
    /** @return Student[] */
    public function StudentsAndCourses(): array
    {
        return $this->createQueryBuilder('student')
            ->addSelect('phone')
            ->addSelect('course')
            ->leftJoin('student.phones', 'phone')
            ->leftJoin('student.courses', 'courses')
            ->getQuery()
            ->getResult();
        /**
        $dql = 'SELECT student , phone, course
                  FROM doctrine\\Entity\\Student student
             LEFT JOIN student.phones phone
             LEFT JOIN student.courses course';

       return $this->getEntityManager()->createQuery($dql)->getResult();
        **/
    }

}