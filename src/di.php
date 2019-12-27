<?php

use App\Search\Application\EmployeeRepository;
use App\Search\Application\ManagerRepository;

return [
    EmployeeRepository::class => DI\create(\App\Search\Infrastructure\Eloquent\EmployeeRepository::class),
    ManagerRepository::class => DI\create(\App\Search\Infrastructure\Eloquent\ManagerRepository::class),
];
