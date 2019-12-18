<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;
use Src\Domain\HireDate;

class HireDateTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidHireDate() {
        $value = "2019-05-20";

        $hireDate = new HireDate($value);

        $this->assertInstanceOf(HireDate::class, $hireDate);
    }
}
