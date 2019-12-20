<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\Employee\Id;
use App\Domain\Manager;

interface ManagerRepository
{
    public function find(Id $id): ?Manager;
}