<?php

declare(strict_types=1);

namespace UnitTests\Domain;

use App\Search\Domain\Employee\Salary;
use App\Search\Domain\Employee\Title;
use DateTimeImmutable;
use App\Search\Domain\DepartmentRange;
use App\Search\Domain\Employee;
use App\Search\Domain\Employee\BirthDate;
use App\Search\Domain\Employee\FirstName;
use App\Search\Domain\Employee\Gender;
use App\Search\Domain\Employee\HireDate;
use App\Search\Domain\Employee\Id;
use App\Search\Domain\Employee\LastName;

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

    public static function withAllInfo(): self {
        $departmentRange = FakeDepartmentRange::withFirstRange();
        $employee = new self();
        $employee->addDepartmentRange($departmentRange);
        $employee->addSalary(new Salary(1200.00, new DateTimeImmutable(), new DateTimeImmutable()));
        $employee->addTitle(new Title('Engineer', new DateTimeImmutable(), new DateTimeImmutable()));

        return $employee;
    }
}
