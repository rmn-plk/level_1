<?php

namespace App;
include_once ("Student.php");
class Aspirant extends Student
{

    public function getScholarship(): int
    {
        return $this->averageMark == 5 ? 200 : 180;
    }
}