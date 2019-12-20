<?php

declare(strict_types=1);

namespace App\Domain\Employee;

class Id
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function equals(Id $id): bool {
        return (string)$this === (string)$id;
    }

    public function __toString(): string {
        return $this->value;
    }
}