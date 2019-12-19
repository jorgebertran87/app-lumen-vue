<?php

declare(strict_types=1);

namespace Src\Application;

use Src\Domain\Employee;
use Src\Domain\Employee\Id;

interface EmployeeRepository
{
    public function get(): array;

    public function add(Employee $employee): void;

    public function find(Id $id): ?Employee;
}