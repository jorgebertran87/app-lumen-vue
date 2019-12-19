<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use PHPUnit\Framework\TestCase;
use Src\Domain\Department;

class DepartmentTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidDepartment() {
        $department = new FakeDepartment('name');

        $this->assertInstanceOf(Department::class, $department);
    }
}
