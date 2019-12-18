<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;
use Src\Domain\Gender;
use Src\Domain\InvalidGenderException;

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
