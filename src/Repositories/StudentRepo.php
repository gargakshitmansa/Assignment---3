<?php

namespace App\Repositories;

use App\Models\Student;
use App\Exceptions\StudentNotFoundException;

class StudentRepository {
    private array $students = [];

    public function add(Student $student): void {
        $this->students[] = $student;
    }

    public function getAll(): array {
        return $this->students;
    }

    public function findById(string $crn): Student {
        foreach ($this->students as $student) {
            if ($student->getCrn() === $crn) {
                return $student;
            }
        }

        throw new StudentNotFoundException("Student with CRN {$crn} not found.");
    }

    public function delete(string $crn): bool {
        foreach ($this->students as $key => $student) {
            if ($student->getCrn() === $crn) {
                unset($this->students[$key]);
                $this->students = array_values($this->students);
                return true;
            }
        }

        throw new StudentNotFoundException("Student with CRN {$crn} cannot be deleted because it was not found.");
    }
}