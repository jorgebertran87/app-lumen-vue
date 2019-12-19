<?php

declare(strict_types=1);

namespace UnitTests\Infrastructure;

use PHPUnit\Framework\TestCase;
use Src\Domain\Employee;
use Src\Infrastructure\GetEmployeesQuery;
use UnitTests\Domain\FakeEmployee;

class GetEmployeesQueryTest extends TestCase
{
    /** @test */
    public function itShouldReturnEmployees() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = new FakeEmployee();
        $employeeRepository->add($employee);


        $getEmployeesQuery = new GetEmployeesQuery();
        $employees = $bus->handle($getEmployeesQuery);

        $this->assertInstanceOf(Employee::class, $employees[0]);
    }

}
