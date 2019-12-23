<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use PHPUnit\Framework\TestCase;
use App\Domain\Department;

class DepartmentTest extends TestCase
{
    /**
     * @var FakeDepartment
     */
    private $department;

    public function setUp(): void
    {
        parent::setUp();
        $this->department = new FakeDepartment('name');
    }

    /** @test */
    public function itShouldCreateAValidDepartment() {
        $this->assertInstanceOf(Department::class, $this->department);
    }

    /** @test */
    public function itShouldReturnAValidName() {
        $this->assertInstanceOf(Department\Name::class, $this->department->name());
    }

    /** @test */
    public function itShouldReturnAValidId() {
        $this->assertInstanceOf(Department\Id::class, $this->department->id());
    }
}
