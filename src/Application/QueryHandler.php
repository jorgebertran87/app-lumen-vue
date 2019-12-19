<?php

declare(strict_types=1);

namespace Src\Application;

interface QueryHandler
{
    /** @return mixed */
    public function handle();
}