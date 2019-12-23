<?php

namespace App\Infrastructure\Eloquent;

use App\Application\ManagerRepository as ManagerRepositoryInterface;
use App\Domain\Department;
use App\Domain\DepartmentRange;
use App\Domain\DepartmentRange\Date;
use App\Domain\Employee\BirthDate;
use App\Domain\Employee\FirstName;
use App\Domain\Employee\Gender;
use App\Domain\Employee\HireDate;
use App\Domain\Employee\Id;
use App\Domain\Employee\LastName;
use App\Domain\Manager as ManagerDomain;
use Illuminate\Database\Eloquent\Collection;

class ManagerRepository implements ManagerRepositoryInterface
{
    public function get(): array {
        $rows = Manager::whereHas('departments')->get();

        return $this->convertToManagers($rows);
    }

    public function find(Id $id): ?ManagerDomain
    {
        $row = Manager::whereHas('departments')->find((string)$id);

        if ($row) {
            return $this->convertToManager($row);
        }

        return null;
    }

    public function findByIdAndDate(Id $id, ?\DateTimeImmutable $date): ?ManagerDomain
    {
        /** @var Manager $row */
        $row = Manager::with('departments')->whereHas('departments')->find((string)$id);

        if ($row) {
            $manager = $this->convertToManager($row);

            foreach($row->departments as $rowDepartment) {
                $from = new Date(new \DateTimeImmutable($rowDepartment->pivot['from_date']));
                $to = new Date(new \DateTimeImmutable($rowDepartment->pivot['to_date']));

                if (is_null($date) || ($from->value() <= $date && $to->value() >= $date)) {
                    $id = new Department\Id($rowDepartment['dept_no']);
                    $name = new Department\Name($rowDepartment['dept_name']);
                    $department = new Department($id, $name);
                    $departmentRange = new DepartmentRange($department, $from, $to);
                    $manager->addDepartmentRange($departmentRange);
                }
            }

            return $manager;
        }

        return null;
    }

    private function convertToManagers(Collection $rows): array {
        $managers = [];

        foreach($rows as $row) {
            $managers[] = $this->convertToManager($row);
        }

        return $managers;
    }

    private function convertToManager(Manager $row): ManagerDomain
    {
        $id = new Id($row["emp_no"]);
        $birthDate = new BirthDate($row["birth_date"]);
        $firstName = new FirstName($row["first_name"]);
        $lastName = new LastName($row["last_name"]);
        $gender = new Gender($row["gender"]);
        $hireDate = new HireDate($row["hire_date"]);

        return new ManagerDomain($id, $birthDate, $firstName, $lastName, $gender, $hireDate);
    }
}
