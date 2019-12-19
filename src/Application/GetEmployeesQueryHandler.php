<?php

declare(strict_types=1);

namespace Src\Application;

use Src\Application\EmployeeRepository;
use Src\Application\QueryHandler;

class GetEmployeesQueryHandler implements QueryHandler
{
    /** @var EmployeeRepository */
    private $repository;

    public function __construct(EmployeeRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @param GetEmployeesQuery $query
     * @return mixed
     */
    public function handle($query)
    {
        return $this->repository->get();
    }
}