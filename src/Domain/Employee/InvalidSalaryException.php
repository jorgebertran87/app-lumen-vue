<?php

namespace Src\Domain\Employee;

use Exception;
use DateTimeImmutable;

class InvalidSalaryException extends Exception
{
    public static function fromValue(float $value): self {
        return new self('Salary with value ' . $value . ' not valid');
    }

    public static function fromRange(DateTimeImmutable $from, DateTimeImmutable $to): self {
        $formattedFrom = $from->format('Y-m-d');
        $formattedTo = $to->format('Y-m-d');

        return new self(
            'Salary with range ' . $formattedFrom  . ' - ' . $formattedTo . ' not valid'
        );
    }
}