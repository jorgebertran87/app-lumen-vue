<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Src\Domain\Department;
use Src\Domain\Manager;

class ManagerTest extends TestCase
{
    /** @var Manager */
    private $manager;

    protected function setUp(): void {
        $employee = new FakeEmployee();
        $this->manager = new Manager($employee);
    }

    /** @test */
    public function itShouldCreateAValidManager() {
        $this->assertInstanceOf(Manager::class, $this->manager);
    }

    /** @test */
    public function itShouldReturnADepartment() {
        $department = new FakeDepartment();
        $from = new DateTimeImmutable();
        $to = new DateTimeImmutable();
        $this->manager->addDepartment($department, $from, $to);

        $departments = $this->manager->departments();

        $this->assertInstanceOf(Department::class, $departments[0]);
    }
}
