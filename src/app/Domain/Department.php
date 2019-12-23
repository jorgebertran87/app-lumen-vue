<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Department\Id;
use App\Domain\Department\Name;

class Department
{
    /**
     * @var Name
     */
    private $name;
    /**
     * @var Id
     */
    private $id;

    public function __construct(Id $id, Name $name)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function id(): Id {
        return $this->id;
    }

    public function name(): Name {
        return $this->name;
    }
}
