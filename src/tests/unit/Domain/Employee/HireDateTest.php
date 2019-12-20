<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Employee;

use PHPUnit\Framework\TestCase;
use App\Domain\Employee\HireDate;
use App\Domain\Employee\InvalidHireDateException;

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
