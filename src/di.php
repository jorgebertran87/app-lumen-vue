<?php

use App\Application\EmployeeRepository;
use App\Application\ManagerRepository;
use UnitTests\Application\ManagerRepositoryStub;

return [
    EmployeeRepository::class => DI\create(\App\Infrastructure\Eloquent\EmployeeRepository::class),
    ManagerRepository::class => DI\create(ManagerRepositoryStub::class),
];
