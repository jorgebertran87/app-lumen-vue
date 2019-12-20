<?php

declare(strict_types=1);

namespace Src\Application;

interface QueryHandler
{
    /**
     * @param mixed $query
     * @return mixed
     */
    public function handle($query);
}