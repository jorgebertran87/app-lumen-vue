<?php

declare(strict_types=1);

namespace UnitTests\Application;

use App\Application\GetManagersQuery;
use App\Domain\Manager;
use PHPUnit\Framework\TestCase;
use UnitTests\Domain\FakeManager;

class GetManagersQueryTest extends TestCase
{
    /** @test */
    public function itShouldReturnManagers() {
        $bus = new QueryBusStub();

        $managerRepository = $bus->managerRepository();
        $manager = new FakeManager();
        $managerRepository->add($manager);


        $getManagersQuery = new GetManagersQuery();
        $managers = $bus->handle($getManagersQuery);

        $this->assertInstanceOf(Manager::class, $managers[0]);
    }
}
