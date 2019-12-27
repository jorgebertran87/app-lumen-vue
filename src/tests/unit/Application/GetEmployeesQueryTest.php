<?php

declare(strict_types=1);

namespace UnitTests\Application;

use PHPUnit\Framework\TestCase;
use App\Search\Domain\Department;
use App\Search\Domain\DepartmentRange;
use App\Search\Domain\Employee;
use App\Search\Application\GetEmployeesQuery;
use App\Search\Domain\Manager;
use UnitTests\Domain\FakeEmployee;
use UnitTests\Domain\FakeManager;

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

    /** @test */
    public function itShouldReturnEmptyArray() {
        $bus = new QueryBusStub();

        $getEmployeesQuery = new GetEmployeesQuery();
        $employees = $bus->handle($getEmployeesQuery);

        $this->assertCount(0, $employees);
    }

    /** @test */
    public function itShouldReturnOneEmployeeFromSameDepartment() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = FakeEmployee::withFirstDepartmentRange();
        $employee2 = FakeEmployee::withSecondDepartmentRange();
        $employeeRepository->add($employee);
        $employeeRepository->add($employee2);

        $managerRepository = $bus->managerRepository();
        $manager = FakeManager::withFirstDepartmentRange();
        $managerRepository->add($manager);


        $departmentsRanges = $manager->departmentsRanges();

        /** @var DepartmentRange $departmentRange */
        $departmentRange = $departmentsRanges[0];
        $from = $departmentRange->from()->value()->format('Y-m-d');
        $page = 1;
        $rows = 50;

        $getEmployeesQuery = new GetEmployeesQuery($page,$rows,(string)$manager->id(), $from);
        $employees = $bus->handle($getEmployeesQuery);

        $this->assertCount(1, $employees);
    }

    /** @test */
    public function itShouldReturnAnEmptyArrayFromEmptyDepartment() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = new FakeEmployee();
        $employeeRepository->add($employee);

        $managerRepository = $bus->managerRepository();
        $manager = FakeManager::withFirstDepartmentRange();
        $managerRepository->add($manager);


        $departmentsRanges = $manager->departmentsRanges();

        /** @var DepartmentRange $departmentRange */
        $departmentRange = $departmentsRanges[0];
        $from = $departmentRange->from()->value()->format('Y-m-d');
        $page = 1;
        $rows = 50;

        $getEmployeesQuery = new GetEmployeesQuery($page, $rows, (string)$manager->id(), $from);
        $employees = $bus->handle($getEmployeesQuery);

        $this->assertCount(0, $employees);
    }

    /** @test */
    public function itShouldReturnAnEmptyArrayFromDifferentDepartmentRange() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = FakeEmployee::withFirstDepartmentRange();
        $employeeRepository->add($employee);

        $managerRepository = $bus->managerRepository();
        $manager = FakeManager::withSecondDepartmentRange();
        $managerRepository->add($manager);


        $departmentsRanges = $manager->departmentsRanges();

        /** @var DepartmentRange $departmentRange */
        $departmentRange = $departmentsRanges[0];
        $from = $departmentRange->from()->value()->format('Y-m-d');
        $page = 1;
        $rows = 50;

        $getEmployeesQuery = new GetEmployeesQuery($page, $rows, (string)$manager->id(), $from);
        $employees = $bus->handle($getEmployeesQuery);

        $this->assertCount(0, $employees);
    }

    /** @test */
    public function itShouldReturnAnEmptyArrayFromDifferentDepartmentName() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = FakeEmployee::withFirstDepartmentRange();
        $employeeRepository->add($employee);

        $managerRepository = $bus->managerRepository();
        $manager = FakeManager::withFirstDepartmentRange('different_name');
        $managerRepository->add($manager);


        $departmentsRanges = $manager->departmentsRanges();

        /** @var DepartmentRange $departmentRange */
        $departmentRange = $departmentsRanges[0];
        $from = $departmentRange->from()->value()->format('Y-m-d');
        $page = 1;
        $rows = 50;

        $getEmployeesQuery = new GetEmployeesQuery($page, $rows, (string)$manager->id(), $from);
        $employees = $bus->handle($getEmployeesQuery);

        $this->assertCount(0, $employees);
    }
}
