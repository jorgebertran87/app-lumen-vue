<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Employee\BirthDate;
use App\Domain\Employee\FirstName;
use App\Domain\Employee\Gender;
use App\Domain\Employee\HireDate;
use App\Domain\Employee\Id;
use App\Domain\Employee\LastName;

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