<?php

declare(strict_types=1);

namespace App\Domain\Employee;

use DateTimeImmutable;

class Title
{
    /**
     * @var string
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

    /** @throws InvalidTitleException */
    public function __construct(string $value, DateTimeImmutable $from, DateTimeImmutable $to=null)
    {
        if ($value === "") {
            throw InvalidTitleException::fromValue($value);
        }

        if (!is_null($to) && $from > $to) {
            throw InvalidTitleException::fromRange($from, $to);
        }

        $this->value = $value;
        $this->from = $from;
        $this->to = $to;
    }

    public function value(): string {
        return $this->value;
    }

    public function from(): DateTimeImmutable {
        return $this->from;
    }

    public function to(): DateTimeImmutable {
        return $this->to;
    }
}
