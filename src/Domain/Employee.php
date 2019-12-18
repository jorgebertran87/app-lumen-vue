<?php

declare(strict_types=1);

namespace Src\Domain;

class Employee
{
    /**
     * @var FirstName
     */
    private $firstName;
    /**
     * @var LastName
     */
    private $lastName;
    /**
     * @var Gender
     */
    private $gender;
    /**
     * @var HireDate
     */
    private $hireDate;

    public function __construct(FirstName $firstName, LastName $lastName, Gender $gender, HireDate $hireDate)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->hireDate = $hireDate;
    }
}