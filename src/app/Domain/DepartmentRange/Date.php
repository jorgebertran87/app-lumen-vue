<?php

declare(strict_types=1);

namespace App\Domain\DepartmentRange;

use DateTimeImmutable;

class Date extends DateTimeImmutable
{
    /** @var DateTimeImmutable */
    private $value;

    public function __construct(DateTimeImmutable $value) {
        $this->value = $value->setTime(0, 0);
    }

    public function value(): DateTimeImmutable {
        return $this->value;
    }
}