<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Department;

use PHPUnit\Framework\TestCase;
use App\Domain\Department\InvalidNameException;
use App\Domain\Department\Name;

class NameTest extends TestCase
{
    /**
     * @test
     * @throws InvalidNameException
     */
    public function itShouldCreateAValidName() {
        $value = "Name";

        $firstName = new Name($value);

        $this->assertInstanceOf(Name::class, $firstName);
    }

    /**
     * @test
     * @throws InvalidNameException
     */
    public function itShouldThrowAnExceptionForInvalidName() {
        $value = "";
        $this->expectException(InvalidNameException::class);
        $name = new Name($value);
    }
}
