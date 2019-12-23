<?php

declare(strict_types=1);

namespace UnitTests\Domain;

use App\Domain\Department;
use App\Domain\Department\Name;
use App\Domain\Department\Id;

class FakeDepartment extends Department
{
    public function __construct(string $name) {
        $name = new Name($name);
        $id = new Id('d001');
        parent::__construct($id, $name);
    }
}
