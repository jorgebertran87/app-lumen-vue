<?php

declare(strict_types=1);

namespace UnitTests\Application;

use Src\Application\EmployeeRepository;
use Src\Domain\Employee;
use Src\Domain\Employee\Id;

class EmployeeRepositoryStub implements EmployeeRepository
{
    /** @var array */
    private $employees;

    public function __construct()
    {
        $this->employees = [];
    }

    public function get(): array
    {
        return $this->employees;
    }

    public function add(Employee $employee): void
    {
        $this->employees[] = $employee;
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
}