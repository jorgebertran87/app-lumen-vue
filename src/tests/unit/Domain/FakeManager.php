<?php

declare(strict_types=1);

namespace UnitTests\Domain;

use DateTimeImmutable;
use App\Search\Domain\DepartmentRange;
use App\Search\Domain\Employee\BirthDate;
use App\Search\Domain\Employee\FirstName;
use App\Search\Domain\Employee\Gender;
use App\Search\Domain\Employee\HireDate;
use App\Search\Domain\Employee\Id;
use App\Search\Domain\Employee\LastName;
use App\Search\Domain\Manager;

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
