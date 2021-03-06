<?php

namespace App\Http\Controllers;

use App\Search\Application\GetManagersQuery;
use App\Search\Application\ManagerSerializer;
use App\Search\Application\QueryBus;

class ManagersController extends Controller
{
    /**
     * @var ManagerSerializer
     */
    private $serializer;

    public function __construct(QueryBus $queryBus, ManagerSerializer $serializer)
    {
        parent::__construct($queryBus);
        $this->serializer = $serializer;
    }

    public function get() {
        $query = new GetManagersQuery();
        $managers = $this->queryBus->handle($query);
        $result = [];
        foreach($managers as $manager) {
            $result[] = $this->serializer->serialize($manager);
        }
        return $result;
    }
}
