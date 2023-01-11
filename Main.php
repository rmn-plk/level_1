<?php

namespace App;
include_once("Aspirant.php");
$students = [new Student("Ivan", "Ivanov", "851001", 3),
    new Student("Ivan2", "Ivanov2", "951022", 5),
    new Aspirant("Ivan", "Ivanov", "651001", 3),
    new Aspirant("Ivan2", "Ivanov2", "651022", 5)];

array_walk($students, function (Student $student) {
    echo $student . " " . $student->getScholarship() . "\n";
});