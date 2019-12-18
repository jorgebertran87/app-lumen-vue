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

    /**
     * @throws InvalidHireDateException
     * @throws InvalidFirstNameException
     * @throws InvalidLastNameException
     */
    public function __construct(string $firstName, string $lastName, string $gender, DateTimeImmutable $hireDate)
    {
        if ($firstName === "") {
            throw new InvalidFirstNameException();
        }

        if ($lastName === "") {
            throw new InvalidLastNameException();
        }

        $now = new DateTimeImmutable();

        if ($hireDate > $now) {
            throw new InvalidHireDateException();
        }

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->hireDate = $hireDate;
    }
}