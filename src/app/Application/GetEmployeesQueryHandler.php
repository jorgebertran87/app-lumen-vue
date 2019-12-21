<?php

declare(strict_types=1);

namespace App\Application;

use DateTimeImmutable;
use App\Domain\Employee\Id;
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

        if ($query->date() && $query->managerId()) {
            $date = new DateTimeImmutable($query->date());
            $id = new Id($query->managerId());
            $manager = $this->managerRepository->findByIdAndDate($id, $date);
            if ($manager) {
                $departmentsRanges = $manager->departmentsRanges();
            }

            return $this->employeeRepository->getFromManagerDepartmentsRangesAndDate($departmentsRanges, $date);
        }

        return $this->employeeRepository->get();
    }
}