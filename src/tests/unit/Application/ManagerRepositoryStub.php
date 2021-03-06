<?php

declare(strict_types=1);

namespace UnitTests\Application;

use App\Search\Application\ManagerRepository;
use App\Search\Domain\Employee\Id;
use App\Search\Domain\Manager;
use DateTimeImmutable;

class ManagerRepositoryStub implements ManagerRepository
{
    /** @var array */
    private $managers;

    public function __construct()
    {
        $this->managers = [];
    }

    public function find(Id $id): ?Manager
    {
        /** @var Manager $manager */
        foreach($this->managers as $manager) {
            if ($manager->id()->equals($id)) {
                return $manager;
            }
        }

        return null;
    }

    public function add(Manager $manager): void
    {
        $this->managers[] = $manager;
    }

    public function findByIdAndDate(Id $id, ?DateTimeImmutable $date): ?Manager
    {
        /** @var Manager $manager */
        foreach($this->managers as $manager) {
            if ($manager->id()->equals($id)) {
                return $manager;
            }
        }

        return null;
    }

    public function get(): array
    {
        return $this->managers;
    }
}
