<?php

declare(strict_types=1);

namespace Src\Domain;

class Manager extends Employee
{
    public function __construct(Employee $employee)
    {
        parent::__construct(
            $employee->birthDate(),
            $employee->firstName(),
            $employee->lastName(),
            $employee->gender(),
            $employee->hireDate()
        );
    }
}