<?php

namespace App\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;

class DtoEmployee extends Model
{
    public $table = "employees";
    public $timestamps = false;
}
