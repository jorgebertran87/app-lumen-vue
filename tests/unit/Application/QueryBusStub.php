<?php

declare(strict_types=1);

namespace UnitTests\Application;

use Src\Application\EmployeeRepository;
use Src\Application\ManagerRepository;
use Src\Application\QueryBus;

class QueryBusStub extends QueryBus
{
    public function __construct()
    {
        parent::__construct();

        $this->container->set(
            EmployeeRepository::class,
            new EmployeeRepositoryStub()
        );

        $this->container->set(
            ManagerRepository::class,
            new ManagerRepositoryStub()
        );
    }

    /**
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function employeeRepository(): EmployeeRepository {
        return $this->container->get(EmployeeRepository::class);
    }
}