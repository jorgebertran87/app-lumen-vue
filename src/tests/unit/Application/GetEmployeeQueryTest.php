<?php

declare(strict_types=1);

namespace UnitTests\Application;

use PHPUnit\Framework\TestCase;
use App\Application\GetEmployeeQuery;
use App\Domain\Employee;
use UnitTests\Domain\FakeEmployee;

class GetEmployeeQueryTest extends TestCase
{
    /** @test */
    public function itShouldReturnAnEmployee() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = new FakeEmployee();
        $employeeRepository->add($employee);

        $getEmployeeQuery = new GetEmployeeQuery((string)$employee->id());
        $employee = $bus->handle($getEmployeeQuery);

        $this->assertInstanceOf(Employee::class, $employee);
    }

    /** @test */
    public function itShouldReturnNull() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = new FakeEmployee();
        $employeeRepository->add($employee);

        $getEmployeeQuery = new GetEmployeeQuery((string)$employee->id() . 'aaa');
        $employee = $bus->handle($getEmployeeQuery);

        $this->assertNull($employee);
    }

}
