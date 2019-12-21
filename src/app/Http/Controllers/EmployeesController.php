<?php

namespace App\Http\Controllers;

use App\Application\GetEmployeeQuery;
use App\Application\GetEmployeesQuery;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function get(Request $request) {
        $managerId = $request->get('mid', null);
        $date = $request->get('date', null);

        $query = new GetEmployeesQuery($managerId, $date);
        return $this->queryBus->handle($query);
    }

    public function find(Request $request, string $id) {
        $query = new GetEmployeeQuery($id);
        return $this->queryBus->handle($query);
    }
}
