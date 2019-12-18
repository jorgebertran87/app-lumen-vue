<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use PHPUnit\Framework\TestCase;
use Src\Domain\Department;
use Src\Domain\Department\Name;

class DepartmentTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidDepartment() {
        $name = new Name("name");

        $department = new Department($name);

        $this->assertInstanceOf(Department::class, $department);
    }
}
