<?php

namespace App\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;

class DtoEmployee extends Model
{
    public $table = "employees";
    public $timestamps = false;
    public $primaryKey = 'emp_no';

    public function departments()
    {
        return $this->belongsToMany(
            'App\Infrastructure\Eloquent\DtoDepartment',
            'dept_emp',
            'emp_no',
            'dept_no',
            'emp_no',
            'dept_no'
        )->withPivot('from_date', 'to_date');
    }

    public function salaries()
    {
        return $this->hasMany(
            'App\Infrastructure\Eloquent\DtoSalary',
            'emp_no',
            'emp_no'
        );
    }

    public function titles()
    {
        return $this->hasMany(
            'App\Infrastructure\Eloquent\DtoTitle',
            'emp_no',
            'emp_no'
        );
    }
}
