<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use App\Domain\Department;
use App\Domain\DepartmentRange;
use App\Domain\InvalidDepartmentRangeException;
use PHPUnit\Framework\TestCase;

class DepartmentRangeTest extends TestCase
{
    /**
     * @var FakeDepartmentRange
     */
    private $departmentRange;

    public function setUp(): void
    {
        parent::setUp();
        $this->departmentRange = FakeDepartmentRange::withFirstRange();
    }

    /** @test */
    public function itShouldCreateAValidDepartmentRange() {
        $this->assertInstanceOf(DepartmentRange::class, $this->departmentRange);
    }

    /** @test */
    public function itShouldReturnAValidDepartment() {
        $this->assertInstanceOf(Department::class, $this->departmentRange->department());
    }

    /** @test */
    public function itShouldReturnAValidFromDate() {
        $this->assertInstanceOf(DepartmentRange\Date::class, $this->departmentRange->from());
    }

    /** @test */
    public function itShouldReturnAValidToDate() {
        $this->assertInstanceOf(DepartmentRange\Date::class, $this->departmentRange->to());
    }

    /** @test */
    public function itShouldThrowAnException() {
        $this->expectException(InvalidDepartmentRangeException::class);
        $departmentRange = FakeDepartmentRange::withInvalidRange();
    }
}
