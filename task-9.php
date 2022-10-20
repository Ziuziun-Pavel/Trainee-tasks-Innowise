<?php

class Student
{
    public string $firstName;
    public string $lastName;
    public string $group;
    public float $averageMark;

    function __construct($firstName, $lastName, $group, $averageMark)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group = $group;
        $this->averageMark = $averageMark;
    }

    function getScholarship()
    {
        return $this->averageMark == 5 ? "100$" : "80$";
    }
}

class Aspirant extends Student
{
    public string $researchWork;

    function __construct($firstName, $lastName, $group, $averageMark, $researchWork)
    {
        parent::__construct($firstName, $lastName, $group, $averageMark);
        $this->researchWork = $researchWork;
    }

    function getScholarship()
    {
        return $this->averageMark == 5 ? "200$" : "180$";

    }
}

$aspirant1 = new Aspirant('Nick', 'Dayer', 'group13', 4.5, 'Work1');
$student1 = new Student('Frank', 'Lampard', 'group15', 5);


$people = [$aspirant1, $student1];

foreach ($people as $person){
    echo $person->getScholarship(). "\n";
}

