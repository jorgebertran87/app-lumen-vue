<?php

declare(strict_types=1);

namespace App\Search\Application;

use App\Search\Domain\Employee;
use App\Search\Domain\Employee\Id;
use App\Search\Domain\Manager;
use DateTimeImmutable;

interface EmployeeRepository
{
    public function get(PaginationFilters $filters): array;

    public function getFromManagerDepartmentsRangesAndDate(PaginationFilters $filters, array $managerDepartmentsRanges, DateTimeImmutable $date): array;

    public function find(Id $id): ?Employee;

    public function getCount(): int;

    public function getCountFromManagerDepartmentsRangesAndDate(array $managerDepartmentsRanges, DateTimeImmutable $date): int;
}
