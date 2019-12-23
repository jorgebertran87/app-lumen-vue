<?php

namespace App\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $table = "departments";
    public $timestamps = false;
}
