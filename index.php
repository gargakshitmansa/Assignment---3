<?php

require_once __DIR__ . '/src/Models/Student.php';
require_once __DIR__ . '/src/Exceptions/StudentNotFoundException.php';
require_once __DIR__ . '/src/Repositories/StudentRepository.php';
require_once __DIR__ . '/src/Services/StudentService.php';

use App\Repositories\StudentRepository;
use App\Services\StudentService;
use App\Exceptions\StudentNotFoundException;

$repository = new StudentRepository();
$service = new StudentService($repository);

while (true) {
    echo "\n1. Add 2. View 3. Search 4. Delete 5. Exit\n";
    echo "Choice: ";
    $ch = trim(fgets(STDIN));

    if ($ch == '1') {
        echo "CRN: ";
        $crn = trim(fgets(STDIN));

        echo "Name: ";
        $name = trim(fgets(STDIN));

        echo "Email: ";
        $email = trim(fgets(STDIN));

        echo "Branch: ";
        $branch = trim(fgets(STDIN));

        $service->registerStudent($name, $email, $crn, $branch);
        echo "Saved!\n";
    } elseif ($ch == '2') {
        $students = $service->listStudents();
        if (empty($students)) {
            echo "No students found.\n";
        } else {
            foreach ($students as $s) {
                echo $s->getCrn() . " " . $s->getName() . " " . $s->getEmail() . " " . $s->getBranch() . "\n";
            }
        }
    } elseif ($ch == '3') {
        echo "Enter CRN: ";
        $crn = trim(fgets(STDIN));

        try {
            $s = $service->getStudent($crn);
            echo "Found: " . $s->getName() . " (" . $s->getBranch() . ")\n";
        } catch (StudentNotFoundException $e) {
            echo $e->getMessage() . "\n";
        }
    } elseif ($ch == '4') {
        echo "Enter CRN: ";
        $crn = trim(fgets(STDIN));

        try {
            $service->removeStudent($crn);
            echo "Deleted!\n";
        } catch (StudentNotFoundException $e) {
            echo $e->getMessage() . "\n";
        }
    } elseif ($ch == '5') {
        exit("Bye!\n");
    } else {
        echo "Invalid choice!\n";
    }
}