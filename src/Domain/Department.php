<?php

declare(strict_types=1);

namespace Src\Domain;

use Src\Domain\Department\Name;

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
}