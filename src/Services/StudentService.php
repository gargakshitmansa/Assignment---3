<?php

namespace App\Services;

use App\Models\Student;
use App\Repositories\StudentRepository;
use App\Exceptions\StudentNotFoundException;

class StudentService {
    private StudentRepository $repository;

    public function __construct(StudentRepository $repository) {
        $this->repository = $repository;
    }

    public function registerStudent(string $name, string $email, string $crn, string $branch): void {
        $student = new Student($name, $email, $crn, $branch);
        $this->repository->add($student);
    }

    public function listStudents(): array {
        return $this->repository->getAll();
    }

    public function getStudent(string $crn): Student {
        return $this->repository->findById($crn);
    }

    public function removeStudent(string $crn): bool {
        return $this->repository->delete($crn);
    }

    public function findStudent(string $crn): Student {
        return $this->repository->findById($crn);
    }
}