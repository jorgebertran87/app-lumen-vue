<?php

declare(strict_types = 1);

namespace UnitTests;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Src\Domain\Employee;
use Src\Domain\InvalidFirstNameException;
use Src\Domain\InvalidGenderException;
use Src\Domain\InvalidHireDateException;
use Src\Domain\InvalidLastNameException;

class FirstNameTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidFirstName() {
        $value = "FirstName";

        $firstName = new FirstName($value);

        $this->assertInstanceOf(FirstName::class, $firstName);
    }

}
