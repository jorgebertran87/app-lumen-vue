<?php

declare(strict_types=1);

namespace UnitTests\Domain;

use Src\Domain\Department;
use Src\Domain\Department\Name;

class FakeDepartment extends Department
{
    public function __construct() {
        $name = new Name("name");
        parent::__construct($name);
    }
}