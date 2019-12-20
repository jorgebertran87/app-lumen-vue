<?php

declare(strict_types=1);

namespace UnitTests\Application;

use Src\Application\ManagerRepository;
use Src\Domain\Employee\Id;
use Src\Domain\Manager;

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
}