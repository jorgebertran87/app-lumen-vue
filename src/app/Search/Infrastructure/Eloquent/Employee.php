<?php

namespace App\Search\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $table = "employees";
    public $timestamps = false;
    public $primaryKey = 'emp_no';

    public function departments()
    {
        return $this->belongsToMany(
            'App\Search\Infrastructure\Eloquent\Department',
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
            'App\Search\Infrastructure\Eloquent\Salary',
            'emp_no',
            'emp_no'
        );
    }

    public function titles()
    {
        return $this->hasMany(
            'App\Search\Infrastructure\Eloquent\Title',
            'emp_no',
            'emp_no'
        );
    }
}
