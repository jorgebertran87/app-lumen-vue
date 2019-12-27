<?php

declare(strict_types=1);

namespace App\Search\Domain\Employee;

use DateTimeImmutable;

class Salary
{
    /**
     * @var float
     */
    private $value;
    /**
     * @var DateTimeImmutable
     */
    private $from;
    /**
     * @var DateTimeImmutable
     */
    private $to;

    /** @throws InvalidSalaryException */
    public function __construct(float $value, DateTimeImmutable $from, DateTimeImmutable $to=null)
    {
        if (!is_null($to) && $from > $to) {
            throw InvalidSalaryException::fromRange($from, $to);
        }

        $this->value = $value;
        $this->from = $from;
        $this->to = $to;
    }

    public function value(): float {
        return $this->value;
    }

    public function from(): DateTimeImmutable {
        return $this->from;
    }

    public function to(): DateTimeImmutable {
        return $this->to;
    }
}
