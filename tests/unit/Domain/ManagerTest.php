<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use PHPUnit\Framework\TestCase;
use Src\Domain\Manager;

class ManagerTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidManager() {
        $employee = new FakeEmployee();

        $manager = new Manager($employee);

        $this->assertInstanceOf(Manager::class, $manager);
    }
}
