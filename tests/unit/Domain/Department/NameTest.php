<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Employee;

use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldCreateAValidName() {
        $value = "Name";

        $firstName = new Name($value);

        $this->assertInstanceOf(Name::class, $firstName);
    }
}
