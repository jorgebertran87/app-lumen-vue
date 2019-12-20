<?php

declare(strict_types=1);

namespace App\Domain\Employee;

use DateTimeImmutable;
use Throwable;

class HireDate
{
    /**
     * @var DateTimeImmutable
     */
    private $value;

    /** @throws InvalidHireDateException */
    public function __construct(string $value)
    {
        try {
            $date = new DateTimeImmutable($value);

            if ($date > new DateTimeImmutable()) {
                throw new InvalidHireDateException();
            }

            $this->value = $date;

        } catch(Throwable $e) {
            throw new InvalidHireDateException();
        }
    }

    public function __toString(): string
    {
        return $this->value->format('Y-m-d');
    }
}