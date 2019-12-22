<?php

declare(strict_types=1);

namespace UnitTests\Application;

use App\Application\EmployeeRepository;
use App\Application\PaginationFilters;
use App\Domain\DepartmentRange;
use App\Domain\Employee;
use App\Domain\Employee\Id;
use App\Domain\Manager;
use DateTimeImmutable;
use UnitTests\Domain\FakeEmployee;

class EmployeeRepositoryStub implements EmployeeRepository
{
    /** @var array */
    private $employees;

    public function __construct()
    {
        $this->employees = [];
    }

    public function get(PaginationFilters $filters): array
    {
        return $this->employees;
    }

    public function find(Id $id): ?Employee
    {
        /** @var Employee $employee */
        foreach($this->employees as $employee) {
            if ($employee->id()->equals($id)) {
                return $employee;
            }
        }

        return null;
    }

    public function add(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getFromManagerDepartmentsRangesAndDate(PaginationFilters $filters, array $managerDepartmentsRanges, DateTimeImmutable $date): array
    {
        $employees = [];
        /** @var FakeEmployee $employee */
        foreach($this->employees as $employee) {
            $employeeDepartmentRangeFound = false;
            $employeeDepartmentsRanges = $employee->departmentsRanges();
            /** @var DepartmentRange $employeeDepartmentRange */
            foreach($employeeDepartmentsRanges as $employeeDepartmentRange) {
                if ($date < $employeeDepartmentRange->from()->value() || $date > $employeeDepartmentRange->to()->value()) {
                    continue;
                }

                $departmentRangeFound = false;
                if (! is_null($managerDepartmentsRanges)) {
                    /** @var DepartmentRange $departmentRange */
                    foreach($managerDepartmentsRanges as $departmentRange) {
                        if ($date < $departmentRange->from()->value() || $date > $departmentRange->to()->value()) {
                            continue;
                        }

                        if (!$employeeDepartmentRange->department()->name()->equals($departmentRange->department()->name())) {
                            continue;
                        }

                        $departmentRangeFound = true;
                        break;
                    }
                }

                if ($departmentRangeFound) {
                    $employeeDepartmentRangeFound = true;
                }
            }

            if ($employeeDepartmentRangeFound) {
                $employees[] = $employee;
            }
        }

        return $employees;
    }

    public function getCount(): int
    {
        return 0;
    }

    public function getCountFromManagerDepartmentsRangesAndDate(array $managerDepartmentsRanges, DateTimeImmutable $date): int
    {
        return 0;
    }
}