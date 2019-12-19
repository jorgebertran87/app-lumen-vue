<?php

declare(strict_types=1);

namespace Src\Application;

use Src\Domain\Employee;
use Src\Domain\Employee\Id;
use Src\Domain\Manager;
use DateTimeImmutable;

interface EmployeeRepository
{
    public function get(?Manager $manager, ?DateTimeImmutable $date): array;

    public function find(Id $id): ?Employee;
}