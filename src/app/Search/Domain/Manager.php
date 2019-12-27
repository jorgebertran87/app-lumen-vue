<?php

declare(strict_types=1);

namespace App\Search\Domain;

use App\Search\Domain\Employee\BirthDate;
use App\Search\Domain\Employee\FirstName;
use App\Search\Domain\Employee\Gender;
use App\Search\Domain\Employee\HireDate;
use App\Search\Domain\Employee\Id;
use App\Search\Domain\Employee\LastName;

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
