<?php

declare(strict_types=1);

namespace UnitTests\Application;

use App\Search\Application\ManagerSerializer;
use PHPUnit\Framework\TestCase;
use UnitTests\Domain\FakeManager;

class ManagerSerializerTest extends TestCase
{
    const SERIALIZER_KEYS = [
        'id',
        'firstName',
        'lastName'
    ];

    /** @test */
    public function itShouldReturnASerializedArray() {
        $bus = new QueryBusStub();

        $managerRepository = $bus->managerRepository();
        $manager = FakeManager::withFirstDepartmentRange();
        $managerRepository->add($manager);

        $managerSerializer = new ManagerSerializer();
        $serialized = $managerSerializer->serialize($manager);

        foreach(self::SERIALIZER_KEYS as $key) {
            $this->assertArrayHasKey($key, $serialized);
        }
    }
}
