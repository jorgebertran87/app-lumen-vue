<?php

declare(strict_types=1);

namespace App\Search\Domain\DepartmentRange;

use DateTimeImmutable;

class Date
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
