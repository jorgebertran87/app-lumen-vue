<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;
use Src\Domain\Department;

class DepartmentTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidDepartment() {
        $name = "name";

        $employee = new Department($name);

        $this->assertInstanceOf(Department::class, $employee);
    }
}
