<?php

declare(strict_types=1);

namespace App\Search\Domain;

use DateTimeImmutable;
use App\Search\Domain\DepartmentRange\Date;

class DepartmentRange
{
    /** @var Department */
    private $department;
    /** @var Date */
    private $from;
    /** @var Date */
    private $to;


    /** @throws InvalidDepartmentRangeException */
    public function __construct(Department $department, Date $from, Date $to)
    {
        if ($from->value() > $to->value()) {
            throw new InvalidDepartmentRangeException();
        }

        $this->department = $department;
        $this->from = $from;
        $this->to = $to;
    }

    public function department(): Department {
        return $this->department;
    }

    public function from(): Date {
        return $this->from;
    }

    public function to(): Date {
        return $this->to;
    }
}
