<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;
use Src\Domain\BirthDate;
use Src\Domain\Employee;
use Src\Domain\FirstName;
use Src\Domain\Gender;
use Src\Domain\HireDate;
use Src\Domain\LastName;

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
