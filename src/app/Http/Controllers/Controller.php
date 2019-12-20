<?php

namespace App\Http\Controllers;

use App\Application\QueryBus;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @var QueryBus
     */
    protected $queryBus;

    public function __construct(QueryBus $queryBus) {
        $this->queryBus = $queryBus;
    }
}
