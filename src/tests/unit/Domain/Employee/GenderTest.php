<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Employee;

use PHPUnit\Framework\TestCase;
use App\Search\Domain\Employee\Gender;
use App\Search\Domain\Employee\InvalidGenderException;

class GenderTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidGender() {
        $value = "F";

        $firstName = new Gender($value);

        $this->assertInstanceOf(Gender::class, $firstName);
    }

    /**
     * @test
     * @throws InvalidGenderException
     */
    public function itShouldThrowAnExceptionForInvalidGender() {
        $value = "invalid_gender";
        $this->expectException(InvalidGenderException::class);
        $gender = new Gender($value);
    }
}
