<?php

namespace App\Infrastructure\Eloquent;


use App\Application\EmployeeRepository as EmployeeRepositoryInterface;
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
    public function get(?array $departmentsRanges, ?DateTimeImmutable $date): array
    {
        $employees = [];

        $rows = DtoEmployee::take(50)->get();

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