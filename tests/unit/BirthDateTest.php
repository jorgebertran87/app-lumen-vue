<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;
use Src\Domain\BirthDate;
use Src\Domain\FirstName;
use Src\Domain\HireDate;
use Src\Domain\InvalidBirthDateException;
use Src\Domain\InvalidFirstNameException;
use Src\Domain\InvalidHireDateException;

class BirthDateTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidHireDate() {
        $value = "2019-05-20";

        $birthDate = new BirthDate($value);

        $this->assertInstanceOf(BirthDate::class, $birthDate);
    }

    /**
     * @test
     * @throws InvalidBirthDateException
     */
    public function itShouldThrowAnExceptionForInvalidBirthDate() {
        $value = "invalid_date";
        $this->expectException(InvalidBirthDateException::class);
        $hireDate = new BirthDate($value);
    }
}