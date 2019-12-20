<?php

use \App\Application\EmployeeRepository;
use \UnitTests\Application\EmployeeRepositoryStub;
use \App\Application\ManagerRepository;
use \UnitTests\Application\ManagerRepositoryStub;

return [
    EmployeeRepository::class => DI\create(EmployeeRepositoryStub::class),
    ManagerRepository::class => DI\create(ManagerRepositoryStub::class),
];
