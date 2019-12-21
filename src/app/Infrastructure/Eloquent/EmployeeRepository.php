<?php

namespace App\Infrastructure\Eloquent;


use App\Application\EmployeeRepository as EmployeeRepositoryInterface;
use App\Domain\DepartmentRange;
use App\Domain\Employee;
use App\Domain\Employee\Id;
use App\Domain\Employee\BirthDate;
use App\Domain\Employee\FirstName;
use App\Domain\Employee\LastName;
use App\Domain\Employee\Gender;
use App\Domain\Employee\HireDate;
use DateTimeImmutable;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getFromManagerDepartmentsRangesAndDate(array $managerDepartmentsRanges, DateTimeImmutable $date): array
    {
        if ($this->areManagerDepartmentsRangesEmpty($managerDepartmentsRanges)) {
            return [];
        }

        $rows = DtoEmployee::whereHas('departments', function($query) use ($date, $managerDepartmentsRanges) {
            $query->where(function($query) use ($date, $managerDepartmentsRanges) {
                $query
                ->where('from_date', '<=', $date)->where('to_date', '>=', $date)
                ->where(function($query) use($managerDepartmentsRanges) {
                    /** @var DepartmentRange $managerDepartmentRange */
                    foreach($managerDepartmentsRanges as $managerDepartmentRange) {
                        $name = $managerDepartmentRange->department()->name()->value();
                        $query->orWhere(function($query) use ($name) {
                            $query->where('dept_name', $name);
                        });
                    }
                });
            });
        })->take(20)->get()->toArray();

        return $this->serialize($rows);
    }

    private function areManagerDepartmentsRangesEmpty($departmentsRanges) {
        return count($departmentsRanges) === 0;
    }

    public function get(): array
    {
        $rows = DtoEmployee::take(50)->get()->toArray();

        return $this->serialize($rows);
    }

    private function serialize(array $rows): array {
        $employees = [];

        foreach($rows as $row) {
            $id = new Id($row["emp_no"]);
            $birthDate = new BirthDate($row["birth_date"]);
            $firstName = new FirstName($row["first_name"]);
            $lastName = new LastName($row["last_name"]);
            $gender = new Gender($row["gender"]);
            $hireDate = new HireDate($row["hire_date"]);

            $employee = new Employee($id, $birthDate, $firstName, $lastName, $gender, $hireDate);

            $employees[] = $employee->serialize();
        }

        return $employees;
    }

    public function find(Id $id): ?Employee
    {
        return null;
    }
}