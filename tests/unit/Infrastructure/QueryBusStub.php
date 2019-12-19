<?php

declare(strict_types=1);

namespace UnitTests\Infrastructure;

use Src\Application\EmployeeRepository;
use Src\Infrastructure\QueryBus;

class QueryBusStub extends QueryBus
{
    public function __construct()
    {
        parent::__construct();

        $this->container->set(
            EmployeeRepository::class,
            new EmployeeRepositoryStub()
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