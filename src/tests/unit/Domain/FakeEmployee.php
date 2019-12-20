<?php

declare(strict_types=1);

namespace UnitTests\Domain;

use DateTimeImmutable;
use App\Domain\DepartmentRange;
use App\Domain\Employee;
use App\Domain\Employee\BirthDate;
use App\Domain\Employee\FirstName;
use App\Domain\Employee\Gender;
use App\Domain\Employee\HireDate;
use App\Domain\Employee\Id;
use App\Domain\Employee\LastName;

class FakeEmployee extends Employee
{
    public function __construct() {
        $id = new Id('1');
        $birthDate = new BirthDate("1970-01-01");
        $firstName = new FirstName("FirstName");
        $lastName = new LastName("LastName");
        $gender = new Gender("M");
        $hireDate= new HireDate("2019-03-01");

        parent::__construct($id, $birthDate, $firstName, $lastName, $gender, $hireDate);
    }

    public static function withFirstDepartmentRange(): self {
        $departmentRange = FakeDepartmentRange::withFirstRange();
        $employee = new self();
        $employee->addDepartmentRange($departmentRange);

        return $employee;
    }

    public static function withSecondDepartmentRange(): self {
        $departmentRange = FakeDepartmentRange::withSecondRange();
        $employee = new self();
        $employee->addDepartmentRange($departmentRange);

        return $employee;
    }
}