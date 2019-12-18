<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;

class LastNameTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidLastName() {
        $value = "LastName";

        $firstName = new LastName($value);

        $this->assertInstanceOf(LastName::class, $firstName);
    }
}
