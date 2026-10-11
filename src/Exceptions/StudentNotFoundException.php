<?php

namespace App\Exceptions;

use Exception;

class StudentNotFoundException extends Exception {
    public function __construct(string $message = "Student not found.") {
        parent::__construct($message);
    }
}