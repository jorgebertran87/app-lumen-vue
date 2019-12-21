<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\Employee;

class EmployeeSerializer
{
    public function serialize(Employee $employee): array {
        return [
            'id' => (string)$employee->id(),
            'birthDate' => (string)$employee->birthDate(),
            'firstName' => (string)$employee->firstName(),
            'lastName' => (string)$employee->lastName(),
            'gender' => (string)$employee->gender(),
            'hireDate' => (string)$employee->hireDate(),
        ];
    }
}