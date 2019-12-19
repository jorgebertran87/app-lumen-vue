<?php

declare(strict_types=1);

namespace Src\Domain;

use Src\Domain\Employee\BirthDate;
use Src\Domain\Employee\FirstName;
use Src\Domain\Employee\Gender;
use Src\Domain\Employee\HireDate;
use Src\Domain\Employee\Id;
use Src\Domain\Employee\LastName;
use Src\Domain\Employee\Salary;
use Src\Domain\Employee\Title;

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
    /**
     * @var array
     */
    private $titles;
    /**
     * @var array
     */
    private $salaries;
    /**
     * @var Id
     */
    private $id;

    public function __construct(
        Id $id,
        BirthDate $birthDate,
        FirstName $firstName,
        LastName $lastName,
        Gender $gender,
        HireDate $hireDate
    ) {
        $this->id = $id;
        $this->birthDate = $birthDate;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->hireDate = $hireDate;
    }

    public function addTitle(Title $title): void {
        $this->titles[0] = $title;
    }

    public function addSalary(Salary $salary): void {
        $this->salaries[0] = $salary;
    }

    public function id(): Id {
        return $this->id;
    }

    public function birthDate(): BirthDate {
        return $this->birthDate;
    }

    public function firstName(): FirstName {
        return $this->firstName;
    }

    public function lastName(): LastName {
        return $this->lastName;
    }

    public function gender(): Gender {
        return $this->gender;
    }

    public function hireDate(): HireDate {
        return $this->hireDate;
    }

    public function titles(): array {
        return $this->titles;
    }

    public function salaries(): array {
        return $this->salaries;
    }
}