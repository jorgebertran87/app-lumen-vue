<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Employee;

use PHPUnit\Framework\TestCase;
use App\Search\Domain\Employee\FirstName;
use App\Search\Domain\Employee\InvalidFirstNameException;

class FirstNameTest extends TestCase
{
    /**
     * @test
     * @throws InvalidFirstNameException
     */
    public function itShouldCreateAValidFirstName() {
        $value = "FirstName";

        $firstName = new FirstName($value);

        $this->assertInstanceOf(FirstName::class, $firstName);
    }

    /**
     * @test
     * @throws InvalidFirstNameException
     */
    public function itShouldThrowAnExceptionForInvalidFirstName() {
        $value = "";
        $this->expectException(InvalidFirstNameException::class);
        $firstName = new FirstName($value);
    }

}
