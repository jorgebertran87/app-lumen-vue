<?php

declare(strict_types=1);

namespace App\Application;

class GetTotalEmployeesQuery
{
    /**
     * @var string
     */
    private $managerId;
    /**
     * @var string
     */
    private $date;

    public function __construct(string $managerId=null, string $date=null)
    {
        $this->managerId = $managerId;
        $this->date = $date;
    }

    public function managerId(): ?string {
        return $this->managerId;
    }

    public function date(): ?string {
        return $this->date;
    }

}