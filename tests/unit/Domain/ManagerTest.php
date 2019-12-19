<?php

declare(strict_types = 1);

namespace UnitTests\Domain;

use PHPUnit\Framework\TestCase;
use Src\Domain\DepartmentRange;
use Src\Domain\Manager;

class ManagerTest extends TestCase
{
    /** @var Manager */
    private $manager;

    protected function setUp(): void {
        $this->manager = FakeManager::withFirstDepartmentRange();
    }

    /** @test */
    public function itShouldCreateAValidManager() {
        $this->assertInstanceOf(Manager::class, $this->manager);
    }

    /** @test */
    public function itShouldReturnADepartmentRange() {
        $departmentsRanges = $this->manager->departmentsRanges();

        $this->assertInstanceOf(DepartmentRange::class, $departmentsRanges[0]);
    }
}
