<?php

declare(strict_types=1);

namespace Src;

use DateTimeImmutable;


class Employee
{
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $gender;
    /**
     * @var DateTimeImmutable
     */
    private $hireDate;

    /** @throws InvalidHireDateException */
    public function __construct(string $firstName, string $lastName, string $gender, DateTimeImmutable $hireDate)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;

        $now = new DateTimeImmutable();

        if ($hireDate > $now) {
            throw new InvalidHireDateException();
        }

        $this->hireDate = $hireDate;
    }
}