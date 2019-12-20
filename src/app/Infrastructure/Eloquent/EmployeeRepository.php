<?php

namespace App\Infrastructure\Eloquent;


use App\Application\EmployeeRepository as EmployeeRepositoryInterface;
use App\Domain\Employee;
use App\Domain\Employee\Id;
use DateTimeImmutable;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function get(?array $departmentsRanges, ?DateTimeImmutable $date): array
    {
        return DtoEmployee::take(50)->get()->toArray();
    }

    public function find(Id $id): ?Employee
    {
        return null;
    }
}