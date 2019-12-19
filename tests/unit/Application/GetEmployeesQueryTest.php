<?php

declare(strict_types=1);

namespace UnitTests\Application;

use PHPUnit\Framework\TestCase;
use Src\Domain\Employee;
use Src\Application\GetEmployeesQuery;
use UnitTests\Domain\FakeEmployee;

class GetEmployeesQueryTest extends TestCase
{
    /** @tesst */
    public function itShouldReturnEmployees() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = new FakeEmployee();
        $employeeRepository->add($employee);


        $getEmployeesQuery = new GetEmployeesQuery();
        $employees = $bus->handle($getEmployeesQuery);

        $this->assertInstanceOf(Employee::class, $employees[0]);
    }

    /** @test */
    public function itShouldReturnEmptyArray() {
        $bus = new QueryBusStub();

        $getEmployeesQuery = new GetEmployeesQuery();
        $employees = $bus->handle($getEmployeesQuery);

        $this->assertCount(0, $employees);
    }

}
