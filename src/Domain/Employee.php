<?php

declare(strict_types=1);

namespace Src\Domain;

use Src\Domain\Employee\BirthDate;
use Src\Domain\Employee\FirstName;
use Src\Domain\Employee\Gender;
use Src\Domain\Employee\HireDate;
use Src\Domain\Employee\LastName;

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