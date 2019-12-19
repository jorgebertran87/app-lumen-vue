<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Src\Domain\Employee;
use Src\Domain\Employee\Title;

class EmployeeTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidEmployee() {
        $employee = new FakeEmployee();

        $this->assertInstanceOf(Employee::class, $employee);
    }

    /**
     * @test
     * @throws Employee\InvalidTitleException
     */
    public function itShouldReturnATitle() {
        $employee = new FakeEmployee();
        $title = new Title("title", new DateTimeImmutable());

        $employee->addTitle($title);
        $titles = $employee->titles();

        $this->assertInstanceOf(Title::class, $titles[0]);
    }
}
