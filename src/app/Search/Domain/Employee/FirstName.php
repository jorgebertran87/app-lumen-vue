<?php

declare(strict_types=1);

namespace App\Search\Domain\Employee;

class FirstName
{
    /**
     * @var string
     */
    private $value;

    /** @throws InvalidFirstNameException */
    public function __construct(string $value)
    {
        if ($value === "") {
            throw new InvalidFirstNameException();
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
