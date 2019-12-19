<?php

declare(strict_types=1);

namespace UnitTests\Application;

use Src\Application\EmployeeRepository;
use Src\Domain\Employee;
use Src\Domain\Employee\Id;
use Src\Domain\Manager;
use DateTimeImmutable;

class EmployeeRepositoryStub implements EmployeeRepository
{
    /** @var array */
    private $employees;

    public function __construct()
    {
        $this->employees = [];
    }

    public function get(?Manager $manager, ?DateTimeImmutable $date): array
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
}