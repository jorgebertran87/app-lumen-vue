<?php

declare(strict_types=1);

namespace UnitTests\Application;

use App\Application\GetEmployeeQuery;
use App\Application\QueryException;
use App\Domain\Employee;
use PHPUnit\Framework\TestCase;
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
    public function itShouldThrowException() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = new FakeEmployee();
        $employeeRepository->add($employee);

        $getEmployeeQuery = new GetEmployeeQuery((string)$employee->id() . 'aaa');
        $this->expectException(QueryException::class);
        $employee = $bus->handle($getEmployeeQuery);
    }

}
