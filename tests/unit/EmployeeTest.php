<?php

declare(strict_types = 1);

namespace UnitTests;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Src\Employee;
use Src\InvalidFirstNameException;
use Src\InvalidHireDateException;
use Src\InvalidLastNameException;

class EmployeeTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidEmployee() {
        $firstName = "FirstName";
        $lastName = "LastName";
        $gender = "M";
        $hireDate=new DateTimeImmutable("2019-03-01");

        $employee = new Employee($firstName, $lastName, $gender, $hireDate);

        $this->assertInstanceOf(Employee::class, $employee);
    }

    /**
     * @test
     * @throws InvalidHireDateException
     * @throws InvalidFirstNameException
     * @throws InvalidLastNameException
     */
    public function itShouldThrowAnExceptionForInvalidHireDate() {
        $firstName = "FirstName";
        $lastName = "LastName";
        $gender = "M";
        $hireDate=new DateTimeImmutable("2020-03-01");

        $this->expectException(InvalidHireDateException::class);
        $employee = new Employee($firstName, $lastName, $gender, $hireDate);
    }

    /**
     * @test
     * @throws InvalidFirstNameException
     * @throws InvalidHireDateException
     * @throws InvalidLastNameException
     */
    public function itShouldThrowAnExceptionForInvalidFirstName() {
        $firstName = "";
        $lastName = "LastName";
        $gender = "M";
        $hireDate=new DateTimeImmutable("2019-03-01");

        $this->expectException(InvalidFirstNameException::class);
        $employee = new Employee($firstName, $lastName, $gender, $hireDate);
    }

    /**
     * @test
     * @throws InvalidFirstNameException
     * @throws InvalidHireDateException
     * @throws InvalidLastNameException
     */
    public function itShouldThrowAnExceptionForInvalidLastName() {
        $firstName = "FirstName";
        $lastName = "";
        $gender = "M";
        $hireDate=new DateTimeImmutable("2019-03-01");

        $this->expectException(InvalidLastNameException::class);
        $employee = new Employee($firstName, $lastName, $gender, $hireDate);
    }

}
