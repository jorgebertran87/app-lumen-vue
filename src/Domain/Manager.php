<?php

declare(strict_types=1);

namespace Src\Domain;

use Src\Domain\Employee\BirthDate;
use Src\Domain\Employee\FirstName;
use Src\Domain\Employee\Gender;
use Src\Domain\Employee\HireDate;
use Src\Domain\Employee\Id;
use Src\Domain\Employee\LastName;

class Manager extends Employee
{
    public function __construct(
        Id $id,
        BirthDate $birthDate,
        FirstName $firstName,
        LastName $lastName,
        Gender $gender,
        HireDate $hireDate
    ) {
        parent::__construct(
            $id,
            $birthDate,
            $firstName,
            $lastName,
            $gender,
            $hireDate
        );
    }
}