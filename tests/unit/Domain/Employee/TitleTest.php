<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Employee;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class TitleTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidTitle() {
        $value = "2019-05-20";
        $from = new DateTimeImmutable();

        $title = new Title($value, $from);

        $this->assertInstanceOf(Title::class, $title);
    }
}
