<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;

class DepartmentTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidDepartment() {
        $name = "name";

        $employee = new Deparment($name);

        $this->assertInstanceOf(Department::class, $employee);
    }
}
