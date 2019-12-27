<?php

declare(strict_types=1);

namespace App\Search\Application;

class GetEmployeesQuery
{
    /**
     * @var string
     */
    private $managerId;
    /**
     * @var string
     */
    private $date;
    /**
     * @var int
     */
    private $page;
    /**
     * @var int
     */
    private $rows;

    public function __construct(int $page=1, int $rows=50, string $managerId=null, string $date=null)
    {
        $this->managerId = $managerId;
        $this->date = $date;
        $this->page = $page;
        $this->rows = $rows;
    }

    public function page(): int {
        return $this->page;
    }

    public function rows(): int {
        return $this->rows;
    }

    public function managerId(): ?string {
        return $this->managerId;
    }

    public function date(): ?string {
        return $this->date;
    }
}
