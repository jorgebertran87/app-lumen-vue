<?php


namespace App\Search\Application;


class PaginationFilters
{
    /**
     * @var int
     */
    private $numPage;
    /**
     * @var int
     */
    private $numRows;

    public function __construct(int $numPage, int $numRows) {
        $this->numPage = $numPage;
        $this->numRows = $numRows;
    }

    public function numPage(): int {
        return $this->numPage;
    }

    public function numRows(): int {
        return $this->numRows;
    }

}
