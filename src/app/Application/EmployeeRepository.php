<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\Employee;
use App\Domain\Employee\Id;
use App\Domain\Manager;
use DateTimeImmutable;

interface EmployeeRepository
{
    public function get(PaginationFilters $filters): array;

    public function getFromManagerDepartmentsRangesAndDate(PaginationFilters $filters, array $managerDepartmentsRanges, DateTimeImmutable $date): array;

    public function find(Id $id): ?Employee;

    public function getCount(): int;

    public function getCountFromManagerDepartmentsRangesAndDate(array $managerDepartmentsRanges, DateTimeImmutable $date): int;
}