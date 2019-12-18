<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Employee;

use PHPUnit\Framework\TestCase;
use Src\Domain\Employee\BirthDate;
use Src\Domain\Employee\InvalidBirthDateException;

class BirthDateTest extends TestCase
{
    /** @
     * test
     * @throws InvalidBirthDateException
     */
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
