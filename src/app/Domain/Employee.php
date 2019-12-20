<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Employee\BirthDate;
use App\Domain\Employee\FirstName;
use App\Domain\Employee\Gender;
use App\Domain\Employee\HireDate;
use App\Domain\Employee\Id;
use App\Domain\Employee\LastName;
use App\Domain\Employee\Salary;
use App\Domain\Employee\Title;

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

    /** @var array */
    private $departmentsRanges;


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
        $this->departmentsRanges = [];
    }

    public function addTitle(Title $title): void {
        $this->titles[0] = $title;
    }

    public function addSalary(Salary $salary): void {
        $this->salaries[0] = $salary;
    }

    public function addDepartmentRange(DepartmentRange $departmentRange): void {

        $this->departmentsRanges[] = $departmentRange;
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

    public function departmentsRanges(): array {
        return $this->departmentsRanges;
    }
}