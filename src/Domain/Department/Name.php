<?php

declare(strict_types=1);

namespace Src\Domain\Department;

class Name
{
    /**
     * @var string
     */
    private $value;

    /** @throws InvalidNameException */
    public function __construct(string $value)
    {
        if ($value === "") {
            throw new InvalidNameException();
        }

        $this->value = $value;
    }
}