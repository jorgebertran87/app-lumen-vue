<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\Employee\Id;
use App\Domain\Manager;
use DateTimeImmutable;

interface ManagerRepository
{
    public function find(Id $id): ?Manager;

    public function findByIdAndDate(Id $id, ?DateTimeImmutable $date): ?Manager;
}