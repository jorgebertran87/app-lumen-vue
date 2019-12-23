<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use App\Domain\DepartmentRange;
use App\Domain\InvalidDepartmentRangeException;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use App\Domain\Employee;
use App\Domain\Employee\Title;
use App\Domain\Employee\Salary;
use App\Domain\Employee\InvalidTitleException;
use App\Domain\Employee\InvalidSalaryException;

class EmployeeTest extends TestCase
{
    /**
     * @var FakeEmployee
     */
    private $employee;

    public function setUp(): void
    {
        parent::setUp();
        $this->employee = new FakeEmployee();
    }

    /** @test */
    public function itShouldCreateAValidEmployee() {
        $this->assertInstanceOf(Employee::class, $this->employee);
    }

    /**
     * @test
     * @throws InvalidTitleException
     */
    public function itShouldReturnATitle() {
        $title = new Title("title", new DateTimeImmutable());

        $this->employee->addTitle($title);
        $titles = $this->employee->titles();

        $this->assertInstanceOf(Title::class, $titles[0]);
    }

    /**
     * @test
     * @throws InvalidSalaryException
     */
    public function itShouldReturnASalary() {
        $salary = new Salary(1300.52, new DateTimeImmutable());

        $this->employee->addSalary($salary);
        $salaries = $this->employee->salaries();

        $this->assertInstanceOf(Salary::class, $salaries[0]);
    }

    /**
     * @test
     */
    public function itShouldReturnADepartmentRange() {
        $departmentRange = FakeDepartmentRange::withFirstRange();

        $this->employee->addDepartmentRange($departmentRange);
        $departmentRanges = $this->employee->departmentsRanges();

        $this->assertInstanceOf(DepartmentRange::class, $departmentRanges[0]);
    }

    /**
     * @test
     */
    public function itShouldReturnAValidId() {
        $this->assertInstanceOf(Employee\Id::class, $this->employee->id());
    }

    /**
     * @test
     */
    public function itShouldReturnAValidBirthDate() {
        $this->assertInstanceOf(Employee\BirthDate::class, $this->employee->birthDate());
    }

    /**
     * @test
     */
    public function itShouldReturnAValidFirstName() {
        $this->assertInstanceOf(Employee\FirstName::class, $this->employee->firstName());
    }

    /**
     * @test
     */
    public function itShouldReturnAValidLastName() {
        $this->assertInstanceOf(Employee\LastName::class, $this->employee->lastName());
    }

    /**
     * @test
     */
    public function itShouldReturnAValidGender() {
        $this->assertInstanceOf(Employee\Gender::class, $this->employee->gender());
    }

    /**
     * @test
     */
    public function itShouldReturnAValidHireDate() {
        $this->assertInstanceOf(Employee\HireDate::class, $this->employee->hireDate());
    }
}
