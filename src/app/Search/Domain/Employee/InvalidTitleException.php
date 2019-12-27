<?php

namespace App\Search\Domain\Employee;

use Exception;
use DateTimeImmutable;

class InvalidTitleException extends Exception
{
    public static function fromValue(string $value): self {
        return new self('Title with value ' . $value . ' not valid');
    }

    public static function fromRange(DateTimeImmutable $from, DateTimeImmutable $to): self {
        $formattedFrom = $from->format('Y-m-d');
        $formattedTo = $to->format('Y-m-d');

        return new self(
            'Title with range ' . $formattedFrom  . ' - ' . $formattedTo . ' not valid'
        );
    }
}
