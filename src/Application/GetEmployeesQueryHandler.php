<?php

declare(strict_types=1);

namespace Src\Application;

use DateTimeImmutable;
use Src\Domain\Employee\Id;

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
     * @return mixed
     */
    public function handle($query)
    {
        $manager = null;
        $date = null;

        if ($query->managerId()) {
            $id = new Id($query->managerId());
            $manager = $this->managerRepository->find($id);
        }

        if ($query->date()) {
            $date = new DateTimeImmutable($query->date());
        }


        return $this->employeeRepository->get($manager, $date);
    }
}