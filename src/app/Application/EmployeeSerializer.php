<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\DepartmentRange;
use App\Domain\Employee;
use App\Domain\Employee\Salary;
use App\Domain\Employee\Title;

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
            $result['departments'] = [];
            /** @var DepartmentRange $departmentRange */
            foreach($employee->departmentsRanges() as $departmentRange) {
                $result['departments'][] = [
                    "department" => $departmentRange->department()->name()->value(),
                    "from" => $departmentRange->from()->value()->format('Y-m-d'),
                    "to" => $departmentRange->to()->value()->format('Y-m-d')
                ];
            }
        }

        if (count($employee->salaries()) > 0) {
            $result['salaries'] = [];
            /** @var Salary $salary */
            foreach($employee->salaries() as $salary) {
                $result['salaries'][] = [
                    "salary" => number_format($salary->value()/100, 2, '.', ''),
                    "from" => $salary->from()->format('Y-m-d'),
                    "to" => $salary->to()->format('Y-m-d')
                ];
            }
        }

        if (count($employee->titles()) > 0) {
            $result['titles'] = [];
            /** @var Title $title */
            foreach($employee->titles() as $title) {
                $result['titles'][] = [
                    "title" => $title->value(),
                    "from" => $title->from()->format('Y-m-d'),
                    "to" => $title->to()->format('Y-m-d')
                ];
            }
        }
        return $result;
    }
}
