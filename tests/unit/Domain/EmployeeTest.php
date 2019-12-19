<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use PHPUnit\Framework\TestCase;
use Src\Domain\Employee;

class EmployeeTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidEmployee() {
        $employee = new FakeEmployee();

        $this->assertInstanceOf(Employee::class, $employee);
    }
}
