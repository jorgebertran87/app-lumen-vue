<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Department\Name;

class Department
{
    /**
     * @var Name
     */
    private $name;

    public function __construct(Name $name)
    {
        $this->name = $name;
    }

    public function name(): Name {
        return $this->name;
    }
}