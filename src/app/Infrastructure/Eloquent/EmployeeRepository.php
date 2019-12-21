<?php

namespace App\Infrastructure\Eloquent;


use App\Application\EmployeeRepository as EmployeeRepositoryInterface;
use App\Domain\Department;
use App\Domain\DepartmentRange;
use App\Domain\Employee;
use App\Domain\Employee\Id;
use App\Domain\Employee\BirthDate;
use App\Domain\Employee\FirstName;
use App\Domain\Employee\LastName;
use App\Domain\Employee\Gender;
use App\Domain\Employee\HireDate;
use DateTimeImmutable;
use Illuminate\Database\Eloquent\Collection;

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
        })->take(20)->get();

        return $this->convertToEmployees($rows);
    }

    private function areManagerDepartmentsRangesEmpty($departmentsRanges) {
        return count($departmentsRanges) === 0;
    }

    public function get(): array
    {
        $rows = DtoEmployee::take(50)->get();

        return $this->convertToEmployees($rows);
    }

    public function find(Id $id): ?Employee
    {
        /** @var DtoEmployee $row */
        $row = DtoEmployee::with('departments')->with('salaries')->find((string)$id);

        if (is_null($row)) return null;

        return $this->convertToEmployee($row, true);
    }

    private function convertToEmployees(Collection $rows): array {
        $employees = [];

        foreach($rows as $row) {
            $employees[] = $this->convertToEmployee($row);
        }

        return $employees;
    }

    private function convertToEmployee(DtoEmployee $row, $extraInfo=false): Employee {
        $id = new Id($row["emp_no"]);
        $birthDate = new BirthDate($row["birth_date"]);
        $firstName = new FirstName($row["first_name"]);
        $lastName = new LastName($row["last_name"]);
        $gender = new Gender($row["gender"]);
        $hireDate = new HireDate($row["hire_date"]);

        $employee = new Employee($id, $birthDate, $firstName, $lastName, $gender, $hireDate);

        if (!$extraInfo) {
            return $employee;
        }

        foreach($row->departments as $rowDepartment) {
            $department = new Department(new Department\Name($rowDepartment['dept_name']));
            $from = new DepartmentRange\Date(new DateTimeImmutable($rowDepartment->pivot['from_date']));
            $to = new DepartmentRange\Date(new DateTimeImmutable($rowDepartment->pivot['to_date']));
            $departmentRange = new DepartmentRange($department, $from, $to);
            $employee->addDepartmentRange($departmentRange);
        }

        foreach($row->salaries as $rowSalary) {
            $from = new DateTimeImmutable($rowSalary['from_date']);
            $to = new DateTimeImmutable($rowSalary['to_date']);
            $salary = new Employee\Salary($rowSalary['salary'], $from, $to);
            $employee->addSalary($salary);
        }

        return $employee;
    }
}