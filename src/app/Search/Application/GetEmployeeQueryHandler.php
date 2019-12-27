<?php

declare(strict_types=1);

namespace App\Search\Application;

use App\Search\Application\EmployeeRepository;
use App\Search\Application\QueryHandler;
use App\Search\Domain\Employee\Id;

class GetEmployeeQueryHandler implements QueryHandler
{
    /** @var EmployeeRepository */
    private $repository;

    public function __construct(EmployeeRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @param GetEmployeeQuery $query
     * @return mixed
     * @throws EmployeeNotFoundException
     */
    public function handle($query)
    {
        $id = new Id($query->id());
        $employee = $this->repository->find($id);

        if (is_null($employee)) {
            throw new EmployeeNotFoundException();
        }
        return $employee;
    }
}
