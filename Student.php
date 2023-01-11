<?php

namespace App;

class Student
{
    public function __construct(
        private readonly string $firstName, private readonly string $lastName,
        private readonly string $group, protected float $averageMark
    )
    {
    }
    public function __toString(): string
    {
        return "$this->firstName $this->lastName $this->group $this->averageMark";
    }

    public function getScholarship(): int
    {
        return $this->averageMark == 5 ? 100 : 80;
    }

}