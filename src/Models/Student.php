<?php

namespace App\Models;

class Student {
    protected string $name;
    protected string $email;
    protected string $crn;
    protected string $branch;

    public function __construct(
        string $name,
        string $email,
        string $crn,
        string $branch
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->crn = $crn;
        $this->branch = $branch;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getCrn(): string {
        return $this->crn;
    }

    public function getBranch(): string {
        return $this->branch;
    }
}