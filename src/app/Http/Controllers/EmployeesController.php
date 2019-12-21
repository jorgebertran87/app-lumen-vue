<?php

namespace App\Http\Controllers;

use App\Application\EmployeeSerializer;
use App\Application\GetEmployeeQuery;
use App\Application\GetEmployeesQuery;
use App\Application\QueryBus;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * @var EmployeeSerializer
     */
    private $serializer;

    public function __construct(QueryBus $queryBus, EmployeeSerializer $serializer)
    {
        parent::__construct($queryBus);
        $this->serializer = $serializer;
    }

    public function get(Request $request) {
        $managerId = $request->get('mid', null);
        $date = $request->get('date', null);

        $query = new GetEmployeesQuery($managerId, $date);

        $employees = $this->queryBus->handle($query);
        $result = [];
        foreach($employees as $employee) {
            $result[] = $this->serializer->serialize($employee);
        }
        return $result;
    }

    public function find(Request $request, string $id) {
        $query = new GetEmployeeQuery($id);
        return $this->serializer->serialize($this->queryBus->handle($query));
    }
}
