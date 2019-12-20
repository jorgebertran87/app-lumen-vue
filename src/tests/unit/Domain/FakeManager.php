<?php

declare(strict_types=1);

namespace UnitTests\Domain;

use DateTimeImmutable;
use Src\Domain\DepartmentRange;
use Src\Domain\Employee\BirthDate;
use Src\Domain\Employee\FirstName;
use Src\Domain\Employee\Gender;
use Src\Domain\Employee\HireDate;
use Src\Domain\Employee\Id;
use Src\Domain\Employee\LastName;
use Src\Domain\Manager;

class FakeManager extends Manager
{
    public function __construct() {
        $id = new Id('100');
        $birthDate = new BirthDate("1970-01-01");
        $firstName = new FirstName("FirstName");
        $lastName = new LastName("LastName");
        $gender = new Gender("M");
        $hireDate= new HireDate("2019-03-01");

        parent::__construct($id, $birthDate, $firstName, $lastName, $gender, $hireDate);
    }

    public static function withFirstDepartmentRange(string $name = null): self {
        $departmentRange = FakeDepartmentRange::withFirstRange($name);
        $manager = new self();
        $manager->addDepartmentRange($departmentRange);

        return $manager;
    }

    public static function withSecondDepartmentRange(string $name = null): self {
        $departmentRange = FakeDepartmentRange::withSecondRange($name);
        $manager = new self();
        $manager->addDepartmentRange($departmentRange);

        return $manager;
    }
}