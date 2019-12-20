<?php

namespace App\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;

class DtoSalary extends Model
{
    public $table = "salaries";
    public $timestamps = false;
}
