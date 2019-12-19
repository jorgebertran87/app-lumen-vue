<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use PHPUnit\Framework\TestCase;

class ManagerTest extends TestCase
{
    /** @test */
    public function itShouldCreateAValidManager() {
        $employeeId = 1;
        $manager = new Manager($employeeId);

        $this->assertInstanceOf(Manager::class, $manager);
    }
}
