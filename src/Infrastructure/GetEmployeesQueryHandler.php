<?php

declare(strict_types=1);

namespace Src\Infrastructure;

use Src\Application\EmployeeRepository;
use Src\Application\QueryHandler;

class GetEmployeesQueryHandler implements QueryHandler
{
    /** @var EmployeeRepository */
    private $repository;

    public function __construct(EmployeeRepository $repository) {
        $this->repository = $repository;
    }

    /** @return mixed */
    public function handle()
    {
        return $this->repository->get();
    }
}