<?php

declare(strict_types=1);

namespace Src\Application;

interface QueryBus
{
    /** @return mixed */
    public function handle($query);
}