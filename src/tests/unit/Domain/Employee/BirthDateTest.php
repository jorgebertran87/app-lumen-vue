<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Employee;

use PHPUnit\Framework\TestCase;
use App\Search\Domain\Employee\BirthDate;
use App\Search\Domain\Employee\InvalidBirthDateException;

class BirthDateTest extends TestCase
{
    /**
     * @var BirthDate
     */
    private $birthDate;

    /**
     * @throws InvalidBirthDateException
     */
    public function setUp(): void
    {
        parent::setUp();

        $value = "2019-05-20";
        $this->birthDate = new BirthDate($value);
    }

    /**
     * @test
     */
    public function itShouldCreateAValidBirthDate() {
        $this->assertInstanceOf(BirthDate::class, $this->birthDate);
    }

    /**
     * @test
     * @throws InvalidBirthDateException
     */
    public function itShouldThrowAnExceptionForInvalidBirthDate() {
        $value = "invalid_date";
        $this->expectException(InvalidBirthDateException::class);
        $birthDate = new BirthDate($value);
    }

    /**
     * @test
     * @throws InvalidBirthDateException
     */
    public function itShouldThrowAnExceptionForAFutureBirthDate() {
        $now = new \DateTimeImmutable();
        $oneMinuteLater = $now->add(new \DateInterval('PT1M'));
        $this->expectException(InvalidBirthDateException::class);
        $birthDate = new BirthDate($oneMinuteLater->format('Y-m-d H:i:s'));
    }

    /**
     * @test
     */
    public function itShouldReturnAFormattedDateTimeToDate() {
        $this->assertEquals($this->birthDate->value()->format('Y-m-d'), $this->birthDate->__toString());
    }
}
