<?php

declare(strict_types=1);

namespace Src\Domain\Employee;

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
}