<?php

declare(strict_types=1);

namespace App\Application;

use App\Application\EmployeeRepository;
use App\Application\QueryHandler;
use App\Domain\Employee\Id;

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
     */
    public function handle($query)
    {
        $id = new Id($query->id());
        return $this->repository->find($id);
    }
}