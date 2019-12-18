<?php

declare(strict_types=1);

namespace Src;


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
     * @var string
     */
    private $hireDate;

    public function __construct(string $firstName, string $lastName, string $gender, string $hireDate)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->hireDate = $hireDate;
    }
}