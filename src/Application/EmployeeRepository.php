<?php

declare(strict_types=1);

namespace Src\Application;

use Src\Domain\Employee;

interface EmployeeRepository
{
    public function get(): array;

    public function add(Employee $employee): void;
}