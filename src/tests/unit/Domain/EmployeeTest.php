<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use App\Domain\Employee;
use App\Domain\Employee\Title;
use App\Domain\Employee\Salary;
use App\Domain\Employee\InvalidTitleException;
use App\Domain\Employee\InvalidSalaryException;

class EmployeeTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidEmployee() {
        $employee = new FakeEmployee();

        $this->assertInstanceOf(Employee::class, $employee);
    }

    /**
     * @test
     * @throws InvalidTitleException
     */
    public function itShouldReturnATitle() {
        $employee = new FakeEmployee();
        $title = new Title("title", new DateTimeImmutable());

        $employee->addTitle($title);
        $titles = $employee->titles();

        $this->assertInstanceOf(Title::class, $titles[0]);
    }

    /**
     * @test
     * @throws InvalidSalaryException
     */
    public function itShouldReturnASalary() {
        $employee = new FakeEmployee();
        $salary = new Salary(1300.52, new DateTimeImmutable());

        $employee->addSalary($salary);
        $salaries = $employee->salaries();

        $this->assertInstanceOf(Salary::class, $salaries[0]);
    }
}
