<?php

namespace App\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;

class DtoEmployee extends Model
{
    public $table = "employees";
    public $timestamps = false;

    public function departments()
    {
        return $this->belongsToMany(
            'App\Infrastructure\Eloquent\DtoDepartment',
            'dept_emp',
            'emp_no',
            'dept_no',
            'emp_no',
            'dept_no'
        );
    }

    public function salaries()
    {
        return $this->hasMany(
            'App\Infrastructure\Eloquent\DtoSalary',
            'emp_no',
            'emp_no'
        );
    }
}
