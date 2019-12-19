<?php

declare(strict_types=1);

namespace Src\Domain;

use DateTimeImmutable;

class Manager extends Employee
{
    /** @var array */
    private $departmentsRanges;

    public function __construct(Employee $employee)
    {
        parent::__construct(
            $employee->id(),
            $employee->birthDate(),
            $employee->firstName(),
            $employee->lastName(),
            $employee->gender(),
            $employee->hireDate()
        );
    }

    /** @throws InvalidDepartmentRangeException */
    public function addDepartment(Department $department, DateTimeImmutable $from, DateTimeImmutable $to): void {
        if ($from > $to) {
            throw new InvalidDepartmentRangeException();
        }
        $this->departmentsRanges[] = [
            "from" => $from,
            "to" => $to,
            "department" => $department
        ];
    }

    public function departments(): array {
        $departments = [];
        foreach($this->departmentsRanges as $departmentsRange) {
            $departments[] = $departmentsRange['department'];
        }

        return $departments;
    }
}