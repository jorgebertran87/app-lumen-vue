<?php

declare(strict_types = 1);

namespace UnitTests;

use PHPUnit\Framework\TestCase;
use Src\Domain\Gender;

class GenderTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidGender() {
        $value = "F";

        $firstName = new Gender($value);

        $this->assertInstanceOf(Gender::class, $firstName);
    }
}
