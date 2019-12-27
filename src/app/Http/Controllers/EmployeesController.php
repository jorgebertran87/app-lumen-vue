<?php

namespace App\Http\Controllers;

use App\Search\Application\EmployeeSerializer;
use App\Search\Application\GetEmployeeQuery;
use App\Search\Application\GetEmployeesQuery;
use App\Search\Application\GetTotalEmployeesQuery;
use App\Search\Application\QueryBus;
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
        $page = $request->get('page', 1);
        $rows = $request->get('rows', 50);

        $query = new GetEmployeesQuery((int)$page, $rows, $managerId, $date);

        $employees = $this->queryBus->handle($query);

        $totalQuery = new GetTotalEmployeesQuery($managerId, $date);

        $total = $this->queryBus->handle($totalQuery);

        $data = [];
        foreach($employees as $employee) {
            $data[] = $this->serializer->serialize($employee);
        }
        return [
            'data' => $data,
            'rows' => $total
        ];
    }

    public function find(Request $request, string $id) {
        $query = new GetEmployeeQuery($id);
        return $this->serializer->serialize($this->queryBus->handle($query));
    }
}
