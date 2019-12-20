<?php

declare(strict_types=1);

namespace UnitTests\Domain;

use App\Domain\Department;
use App\Domain\Department\Name;

class FakeDepartment extends Department
{
    public function __construct(string $name) {
        $name = new Name($name);
        parent::__construct($name);
    }
}