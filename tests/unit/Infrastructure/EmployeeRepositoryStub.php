<?php

declare(strict_types=1);

namespace UnitTests\Infrastructure;

use Src\Application\EmployeeRepository;
use Src\Domain\Employee;

class EmployeeRepositoryStub implements EmployeeRepository
{
    /** @var array */
    private $employees;

    public function get(): array
    {
        return $this->employees;
    }

    public function add(Employee $employee): void
    {
        $this->employees[] = $employee;
    }
}