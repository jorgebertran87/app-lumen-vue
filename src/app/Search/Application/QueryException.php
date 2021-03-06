<?php

namespace App\Search\Application;

use Exception;
use Throwable;

class QueryException extends Exception
{
    public static function fromQuery(string $query, Throwable $e): self {
        return  new self('Error with query ' . $query, 0, $e);
    }
}
