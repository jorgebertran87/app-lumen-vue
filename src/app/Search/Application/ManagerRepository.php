<?php

declare(strict_types=1);

namespace App\Search\Application;

use App\Search\Domain\Employee\Id;
use App\Search\Domain\Manager;
use DateTimeImmutable;

interface ManagerRepository
{
    public function get(): array;

    public function find(Id $id): ?Manager;

    public function findByIdAndDate(Id $id, ?DateTimeImmutable $date): ?Manager;
}
