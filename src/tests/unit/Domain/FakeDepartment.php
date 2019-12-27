<?php

declare(strict_types=1);

namespace UnitTests\Domain;

use App\Search\Domain\Department;
use App\Search\Domain\Department\Name;
use App\Search\Domain\Department\Id;

class FakeDepartment extends Department
{
    public function __construct(string $name) {
        $name = new Name($name);
        $id = new Id('d001');
        parent::__construct($id, $name);
    }
}
