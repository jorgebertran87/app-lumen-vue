<?php

use App\Application\EmployeeRepository;
use App\Application\ManagerRepository;

return [
    EmployeeRepository::class => DI\create(\App\Infrastructure\Eloquent\EmployeeRepository::class),
    ManagerRepository::class => DI\create(\App\Infrastructure\Eloquent\ManagerRepository::class),
];
