<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Employee;

use PHPUnit\Framework\TestCase;
use App\Search\Domain\Employee\InvalidLastNameException;
use App\Search\Domain\Employee\LastName;

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
