<?php

declare(strict_types=1);

namespace Src\Domain\Employee;

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
}