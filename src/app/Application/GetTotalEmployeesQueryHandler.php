<?php

declare(strict_types=1);

namespace App\Application;

use DateTimeImmutable;
use App\Domain\Employee\Id;
use Exception;

class GetTotalEmployeesQueryHandler implements QueryHandler
{
    /** @var EmployeeRepository */
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository) {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @param GetEmployeesQuery $query
     * @throws Exception
     * @return mixed
     */
    public function handle($query)
    {
        return $this->employeeRepository->getCount();
    }
}