<?php

declare(strict_types=1);

namespace Src\Domain;

use DateTimeImmutable;


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
}