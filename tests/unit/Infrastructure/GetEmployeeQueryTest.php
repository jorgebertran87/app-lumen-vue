<?php

declare(strict_types=1);

namespace UnitTests\Infrastructure;

use PHPUnit\Framework\TestCase;
use Src\Domain\Employee;
use Src\Infrastructure\GetEmployeesQuery;
use UnitTests\Domain\FakeEmployee;

class GetEmployeeQueryTest extends TestCase
{
    /** @test */
    public function itShouldReturnEmployees() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = new FakeEmployee();
        $employeeRepository->add($employee);


        $getEmployeeQuery = new GetEmployeeQuery(1);
        $employee = $bus->handle($getEmployeeQuery);

        $this->assertInstanceOf(Employee::class, $employee);
    }

}
