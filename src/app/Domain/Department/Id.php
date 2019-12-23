<?php

declare(strict_types=1);

namespace App\Domain\Department;

class Id
{
    /**
     * @var string
     */
    private $value;

    /** @throws InvalidIdException */
    public function __construct(string $value)
    {
        if ($value === "") {
            throw new InvalidIdException();
        }

        $this->value = $value;
    }

    public function value(): string {
        return $this->value;
    }

    public function equals(Id $name): bool {
        return $this->value() === $name->value();
    }
}
