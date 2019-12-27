<?php

declare(strict_types=1);

namespace App\Search\Application;

use DateTimeImmutable;
use App\Search\Domain\Employee\Id;
use Exception;

class GetManagersQueryHandler implements QueryHandler
{
    /**
     * @var ManagerRepository
     */
    private $managerRepository;

    public function __construct(ManagerRepository $managerRepository) {
        $this->managerRepository = $managerRepository;
    }

    /**
     * @param GetEmployeesQuery $query
     * @throws Exception
     * @return mixed
     */
    public function handle($query)
    {
        return $this->managerRepository->get();
    }
}
