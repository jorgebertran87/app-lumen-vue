<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;
use Src\Domain\InvalidLastNameException;
use Src\Domain\LastName;

class LastNameTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidLastName() {
        $value = "LastName";

        $firstName = new LastName($value);

        $this->assertInstanceOf(LastName::class, $firstName);
    }

    /**
     * @test
     * @throws InvalidLastNameException
     */
    public function itShouldThrowAnExceptionForInvalidLastName() {
        $value = "";
        $this->expectException(InvalidLastNameException::class);
        $firstName = new LastName($value);
    }
}
