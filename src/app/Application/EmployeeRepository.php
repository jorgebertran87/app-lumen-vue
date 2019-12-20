<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\Employee;
use App\Domain\Employee\Id;
use App\Domain\Manager;
use DateTimeImmutable;

interface EmployeeRepository
{
    public function get(?array $departmentsRanges, ?DateTimeImmutable $date): array;

    public function find(Id $id): ?Employee;
}