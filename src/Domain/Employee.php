<?php

declare(strict_types=1);

namespace Src\Domain;

class Employee
{
    /**
     * @var BirthDate
     */
    private $birthDate;
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

    public function __construct(
        BirthDate $birthDate,
        FirstName $firstName,
        LastName $lastName,
        Gender $gender,
        HireDate $hireDate
    ) {
        $this->birthDate = $birthDate;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->hireDate = $hireDate;
    }
}