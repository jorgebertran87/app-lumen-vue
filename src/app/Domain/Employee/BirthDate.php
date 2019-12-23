<?php

declare(strict_types=1);

namespace App\Domain\Employee;

use DateTimeImmutable;
use Throwable;

class BirthDate
{
    /**
     * @var DateTimeImmutable
     */
    private $value;

    /** @throws InvalidBirthDateException */
    public function __construct(string $value)
    {
        try {
            $date = new DateTimeImmutable($value);

            if ($date > new DateTimeImmutable()) {
                throw new InvalidBirthDateException();
            }

            $this->value = $date;

        } catch(Throwable $e) {
            throw new InvalidBirthDateException();
        }
    }

    public function value(): DateTimeImmutable {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value->format('Y-m-d');
    }
}