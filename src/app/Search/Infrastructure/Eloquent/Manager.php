<?php

namespace App\Search\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public $table = "employees";
    public $timestamps = false;
    public $primaryKey = 'emp_no';

    public function departments()
    {
        return $this->belongsToMany(
            'App\Search\Infrastructure\Eloquent\Department',
            'dept_manager',
            'emp_no',
            'dept_no',
            'emp_no',
            'dept_no'
        )->withPivot(['from_date', 'to_date']);
    }
}
