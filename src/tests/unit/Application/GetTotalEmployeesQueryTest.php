<?php

declare(strict_types=1);

namespace UnitTests\Application;

use App\Application\GetTotalEmployeesQuery;
use App\Domain\DepartmentRange;
use PHPUnit\Framework\TestCase;
use UnitTests\Domain\FakeEmployee;
use UnitTests\Domain\FakeManager;

class GetTotalEmployeesQueryTest extends TestCase
{
    /** @test */
    public function itShouldReturnTheCount() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = new FakeEmployee();
        $employeeRepository->add($employee);

        $getTotalEmployeesQuery = new GetTotalEmployeesQuery();
        $count = $bus->handle($getTotalEmployeesQuery);

        $this->assertEquals(1, $count);
    }

    /** @test */
    public function itShouldReturnZeroWithManagerAndDate() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = new FakeEmployee();
        $employeeRepository->add($employee);

        $managerRepository = $bus->managerRepository();
        $manager = FakeManager::withSecondDepartmentRange();
        $managerRepository->add($manager);


        $departmentsRanges = $manager->departmentsRanges();

        /** @var DepartmentRange $departmentRange */
        $departmentRange = $departmentsRanges[0];
        $from = $departmentRange->from()->value()->format('Y-m-d');

        $getTotalEmployeesQuery = new GetTotalEmployeesQuery((string)$manager->id(), $from);
        $count = $bus->handle($getTotalEmployeesQuery);

        $this->assertEquals(0, $count);
    }
}
