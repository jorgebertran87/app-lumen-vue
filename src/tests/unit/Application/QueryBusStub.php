<?php

declare(strict_types=1);

namespace UnitTests\Application;

use App\Search\Application\EmployeeRepository;
use App\Search\Application\ManagerRepository;
use App\Search\Application\QueryBus;

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

    public function employeeRepository(): EmployeeRepositoryStub {
        return $this->container->get(EmployeeRepository::class);
    }

    public function managerRepository(): ManagerRepositoryStub {
        return $this->container->get(ManagerRepository::class);
    }
}
