<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Employee;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use App\Domain\Employee\InvalidSalaryException;
use App\Domain\Employee\Salary;

class SalaryTest extends TestCase
{
    /**
     * @test
     * @throws InvalidSalaryException
     */
    public function itShouldCreateAValidSalary() {
        $value = 1000.52;
        $from = new DateTimeImmutable();

        $salary = new Salary($value, $from);

        $this->assertInstanceOf(Salary::class, $salary);
    }

    /**
     * @test
     * @throws InvalidSalaryException
     */
    public function itShouldThrowAnExceptionForInvalidSalaryRange() {
        $value = 1050.52;
        $from = new DateTimeImmutable('2019-05-01');
        $to = new  DateTimeImmutable('2018-05-01');

        $this->expectException(InvalidSalaryException::class);
        $salary = new Salary($value, $from, $to);
    }
}
