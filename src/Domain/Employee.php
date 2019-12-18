<?php

declare(strict_types=1);

namespace Src\Domain;

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

    const GENDER_TYPES = ["F", "M"];

    /**
     * @throws InvalidHireDateException
     * @throws InvalidFirstNameException
     * @throws InvalidLastNameException
     * @throws InvalidGenderException
     */
    public function __construct(string $firstName, string $lastName, string $gender, DateTimeImmutable $hireDate)
    {
        if ($firstName === "") {
            throw new InvalidFirstNameException();
        }

        if ($lastName === "") {
            throw new InvalidLastNameException();
        }

        if (!in_array($gender, self::GENDER_TYPES)) {
            throw new InvalidGenderException();
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