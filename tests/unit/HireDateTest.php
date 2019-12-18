<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;
use Src\Domain\Employee\HireDate;
use Src\Domain\Employee\InvalidHireDateException;

class HireDateTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidHireDate() {
        $value = "2019-05-20";

        $hireDate = new HireDate($value);

        $this->assertInstanceOf(HireDate::class, $hireDate);
    }

    /**
     * @test
     * @throws InvalidHireDateException
     */
    public function itShouldThrowAnExceptionForInvalidHireDate() {
        $value = "invalid_date";
        $this->expectException(InvalidHireDateException::class);
        $hireDate = new HireDate($value);
    }
}
