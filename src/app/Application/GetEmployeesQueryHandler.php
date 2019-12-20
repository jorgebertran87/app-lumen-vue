<?php

declare(strict_types=1);

namespace Src\Application;

use DateTimeImmutable;
use Src\Domain\Employee\Id;
use Exception;

class GetEmployeesQueryHandler implements QueryHandler
{
    /** @var EmployeeRepository */
    private $employeeRepository;
    /**
     * @var ManagerRepository
     */
    private $managerRepository;

    public function __construct(EmployeeRepository $employeeRepository, ManagerRepository $managerRepository) {
        $this->employeeRepository = $employeeRepository;
        $this->managerRepository = $managerRepository;
    }

    /**
     * @param GetEmployeesQuery $query
     * @throws Exception
     * @return mixed
     */
    public function handle($query)
    {
        $departmentsRanges = null;
        $date = null;

        if ($query->managerId()) {
            $id = new Id($query->managerId());
            $manager = $this->managerRepository->find($id);
            $departmentsRanges = $manager->departmentsRanges();
        }

        if ($query->date()) {
            $date = new DateTimeImmutable($query->date());
        }

        return $this->employeeRepository->get($departmentsRanges, $date);
    }
}