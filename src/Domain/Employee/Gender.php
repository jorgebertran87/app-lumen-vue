<?php

declare(strict_types=1);

namespace Src\Domain\Employee;

class Gender
{
    /**
     * @var string
     */
    private $value;

    const TYPES = ["F", "M"];

    /** @throws InvalidGenderException */
    public function __construct(string $value)
    {
        if (!in_array($value, self::TYPES)) {
            throw new InvalidGenderException();
        }

        $this->value = $value;
    }
}