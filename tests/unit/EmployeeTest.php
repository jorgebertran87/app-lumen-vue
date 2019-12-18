<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;
use Src\Employee;

class EmployeeTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidEmployee() {
        $firstName = "FirstName";
        $lastName = "LastName";
        $gender = "M";
        $hireDate="2019/03/01";

        $employee = new Employee($firstName, $lastName, $gender, $hireDate);

        $this->assertInstanceOf(Employee::class, $employee);
    }

    /** @test */
    public function itShouldThrowAnExceptionForIncorrectHireDate() {
        $firstName = "FirstName";
        $lastName = "LastName";
        $gender = "M";
        $hireDate="2019/03/01";

        $this->expectException(InvalidHireDate::class);
        $employee = new Employee($firstName, $lastName, $gender, $hireDate);
    }

}
