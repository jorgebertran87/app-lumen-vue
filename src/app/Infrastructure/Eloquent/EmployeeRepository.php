<?php

namespace App\Infrastructure\Eloquent;


use App\Application\EmployeeRepository as EmployeeRepositoryInterface;
use App\Application\PaginationFilters;
use App\Domain\Department;
use App\Domain\DepartmentRange;
use App\Domain\Employee as EmployeeDomain;
use App\Domain\Employee\Id;
use App\Domain\Employee\BirthDate;
use App\Domain\Employee\FirstName;
use App\Domain\Employee\LastName;
use App\Domain\Employee\Gender;
use App\Domain\Employee\HireDate;
use DateTimeImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getFromManagerDepartmentsRangesAndDate(
        PaginationFilters $filters,
        array $managerDepartmentsRanges,
        DateTimeImmutable $date
    ): array {
        if ($this->areManagerDepartmentsRangesEmpty($managerDepartmentsRanges)) {
            return [];
        }

        $numRowsToSkip = ($filters->numPage()-1)*$filters->numRows();
        $query = $this->whereHasDepartmentsFromDateAndManagersDepartmentsRanges($managerDepartmentsRanges, $date);
        $query->skip($numRowsToSkip)->take($filters->numRows());

        return $this->convertToEmployees($query->get());
    }

    public function getCountFromManagerDepartmentsRangesAndDate(array $managerDepartmentsRanges, DateTimeImmutable $date): int
    {
        if ($this->areManagerDepartmentsRangesEmpty($managerDepartmentsRanges)) {
            return 0;
        }

        return $this->whereHasDepartmentsFromDateAndManagersDepartmentsRanges($managerDepartmentsRanges, $date)->count();
    }

    private function whereHasDepartmentsFromDateAndManagersDepartmentsRanges(
        array $managerDepartmentsRanges,
        DateTimeImmutable $date
    ): Builder {
        return Employee::whereHas('departments', function($query) use ($managerDepartmentsRanges, $date) {
            $query->where(function($query) use ($date, $managerDepartmentsRanges) {
                $query
                    ->where('from_date', '<=', $date)->where('to_date', '>=', $date)
                    ->where(function($query) use($managerDepartmentsRanges) {
                        /** @var DepartmentRange $managerDepartmentRange */
                        foreach($managerDepartmentsRanges as $managerDepartmentRange) {
                            $id = $managerDepartmentRange->department()->id()->value();
                            $query->orWhere(function($query) use ($id) {
                                $query->where('dept_emp.dept_no', $id);
                            });
                        }
                    });
            });
        });
    }

    private function areManagerDepartmentsRangesEmpty($departmentsRanges) {
        return count($departmentsRanges) === 0;
    }

    public function get(PaginationFilters $filters): array
    {
        $numRowsToSkip = ($filters->numPage()-1)*$filters->numRows();
        $rows = Employee::skip($numRowsToSkip)->take($filters->numRows())->get();

        return $this->convertToEmployees($rows);
    }

    public function find(Id $id): ?EmployeeDomain
    {
        /** @var Employee $row */
        $row = Employee::with('departments')->with('salaries')->with('titles')->find((string)$id);

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

    private function convertToEmployee(Employee $row, $extraInfo=false): EmployeeDomain
    {
        $id = new Id($row["emp_no"]);
        $birthDate = new BirthDate($row["birth_date"]);
        $firstName = new FirstName($row["first_name"]);
        $lastName = new LastName($row["last_name"]);
        $gender = new Gender($row["gender"]);
        $hireDate = new HireDate($row["hire_date"]);

        $employee = new EmployeeDomain($id, $birthDate, $firstName, $lastName, $gender, $hireDate);

        if (!$extraInfo) {
            return $employee;
        }

        foreach($row->departments as $rowDepartment) {
            $id = new Department\Id($rowDepartment['dept_no']);
            $name = new Department\Name($rowDepartment['dept_name']);
            $department = new Department($id, $name);
            $from = new DepartmentRange\Date(new DateTimeImmutable($rowDepartment->pivot['from_date']));
            $to = new DepartmentRange\Date(new DateTimeImmutable($rowDepartment->pivot['to_date']));
            $departmentRange = new DepartmentRange($department, $from, $to);
            $employee->addDepartmentRange($departmentRange);
        }

        foreach($row->salaries as $rowSalary) {
            $from = new DateTimeImmutable($rowSalary['from_date']);
            $to = new DateTimeImmutable($rowSalary['to_date']);
            $salary = new EmployeeDomain\Salary($rowSalary['salary'], $from, $to);
            $employee->addSalary($salary);
        }

        foreach($row->titles as $rowTitle) {
            $value = $rowTitle['title'];
            $from = new DateTimeImmutable($rowSalary['from_date']);
            $to = new DateTimeImmutable($rowSalary['to_date']);
            $title = new EmployeeDomain\Title($value, $from, $to);
            $employee->addTitle($title);
        }

        return $employee;
    }

    public function getCount(): int
    {
        return Employee::count();
    }
}
