<?php

declare(strict_types=1);

namespace Src\Domain;

class LastName
{
    /**
     * @var string
     */
    private $value;

    /** @throws InvalidLastNameException */
    public function __construct(string $value)
    {
        if ($value === "") {
            throw new InvalidLastNameException();
        }

        $this->value = $value;
    }
}