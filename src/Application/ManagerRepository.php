<?php

declare(strict_types=1);

namespace Src\Application;

use Src\Domain\Employee\Id;
use Src\Domain\Manager;

interface ManagerRepository
{
    public function find(Id $id): ?Manager;
}