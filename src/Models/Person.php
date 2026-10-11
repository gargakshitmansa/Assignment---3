<?php

namespace App\Models;

    class Person{
        protected string $name;
        protected string $email;

        public function __construct(string $name, string $email){
            $this->name = $name;
            $this->email = $email;
        }

        public function getName(): string{
            return $this->name;
        }
        public function getEmail(): string{
            return $this->email;
        }

    }
?>