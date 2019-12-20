<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Employee;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use App\Domain\Employee\InvalidTitleException;
use App\Domain\Employee\Title;

class TitleTest extends TestCase
{
    /**
     * @test
     * @throws InvalidTitleException
     */
    public function itShouldCreateAValidTitle() {
        $value = "title";
        $from = new DateTimeImmutable();

        $title = new Title($value, $from);

        $this->assertInstanceOf(Title::class, $title);
    }

    /**
     * @test
     * @throws InvalidTitleException
     */
    public function itShouldThrowAnExceptionForInvalidTitleValue() {
        $value = "";
        $from = new DateTimeImmutable();
        $this->expectException(InvalidTitleException::class);
        $title = new Title($value, $from);
    }

    /**
     * @test
     * @throws InvalidTitleException
     */
    public function itShouldThrowAnExceptionForInvalidTitleRange() {
        $value = "title";
        $from = new DateTimeImmutable('2019-05-01');
        $to = new  DateTimeImmutable('2018-05-01');

        $this->expectException(InvalidTitleException::class);
        $title = new Title($value, $from, $to);
    }
}
