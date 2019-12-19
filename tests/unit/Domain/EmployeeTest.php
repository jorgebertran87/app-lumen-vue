<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use PHPUnit\Framework\TestCase;
use Src\Domain\Employee;
use Src\Domain\Employee\BirthDate;
use Src\Domain\Employee\FirstName;
use Src\Domain\Employee\Gender;
use Src\Domain\Employee\HireDate;
use Src\Domain\Employee\LastName;

class EmployeeTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidEmployee() {
        $birthDate = new BirthDate("1970-01-01");
        $firstName = new FirstName("FirstName");
        $lastName = new LastName("LastName");
        $gender = new Gender("M");
        $hireDate= new HireDate("2019-03-01");

        $employee = new Employee($birthDate, $firstName, $lastName, $gender, $hireDate);

        $this->assertInstanceOf(Employee::class, $employee);
    }
}