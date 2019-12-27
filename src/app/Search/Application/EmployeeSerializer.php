<?php

declare(strict_types=1);

namespace App\Search\Application;

use App\Search\Domain\DepartmentRange;
use App\Search\Domain\Employee;
use App\Search\Domain\Employee\Salary;
use App\Search\Domain\Employee\Title;

class EmployeeSerializer
{
    public function serialize(Employee $employee): array {
        $result = [
            'id' => (string)$employee->id(),
            'birthDate' => (string)$employee->birthDate(),
            'firstName' => (string)$employee->firstName(),
            'lastName' => (string)$employee->lastName(),
            'gender' => (string)$employee->gender(),
            'hireDate' => (string)$employee->hireDate(),
        ];

        if (count($employee->departmentsRanges()) > 0) {
            $result['departments'] = $this->addDepartments($employee);
        }

        if (count($employee->salaries()) > 0) {
            $result['salaries'] = $this->addSalaries($employee);
        }

        if (count($employee->titles()) > 0) {
            $result['titles'] = $this->addTitles($employee);
        }

        return $result;
    }

    private function addDepartments(Employee $employee): array {
        $result = [];

        /** @var DepartmentRange $departmentRange */
        foreach($employee->departmentsRanges() as $departmentRange) {
            $result[] = [
                "department" => $departmentRange->department()->name()->value(),
                "from" => $departmentRange->from()->value()->format('Y-m-d'),
                "to" => $departmentRange->to()->value()->format('Y-m-d')
            ];
        }

        return $result;
    }

    private function addSalaries(Employee $employee): array {
        $result = [];

        /** @var Salary $salary */
        foreach($employee->salaries() as $salary) {
            $result[] = [
                "salary" => number_format($salary->value()/100, 2, '.', ''),
                "from" => $salary->from()->format('Y-m-d'),
                "to" => $salary->to()->format('Y-m-d')
            ];
        }

        return $result;
    }

    private function addTitles(Employee $employee): array {
        $result = [];

        /** @var Title $title */
        foreach($employee->titles() as $title) {
            $result[] = [
                "title" => $title->value(),
                "from" => $title->from()->format('Y-m-d'),
                "to" => $title->to()->format('Y-m-d')
            ];
        }

        return $result;
    }
}
