<?php

declare(strict_types=1);

namespace Src\Domain;

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
}