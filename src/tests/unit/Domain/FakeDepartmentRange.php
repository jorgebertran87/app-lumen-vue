<?php

declare(strict_types=1);

namespace UnitTests\Domain;

use DateTimeImmutable;
use App\Search\Domain\DepartmentRange;
use App\Search\Domain\DepartmentRange\Date;

class FakeDepartmentRange extends DepartmentRange
{
    public static function withFirstRange(string $name = null): self {
        $department = new FakeDepartment($name ? $name: 'name');
        $from = new Date(new DateTimeImmutable('2019-07-01'));
        $to = new Date(new DateTimeImmutable('2019-07-31'));

        return new self($department, $from, $to);
    }

    public static function withSecondRange(string $name = null): self {
        $department = new FakeDepartment($name ? $name: 'name');
        $from = new Date(new DateTimeImmutable('2018-07-01'));
        $to = new Date(new DateTimeImmutable('2018-07-31'));

        return new self($department, $from, $to);
    }

    public static function withInvalidRange(string $name = null): self {
        $department = new FakeDepartment($name ? $name: 'name');
        $from = new Date(new DateTimeImmutable('2019-07-01'));
        $to = new Date(new DateTimeImmutable('2018-07-31'));

        return new self($department, $from, $to);
    }
}
