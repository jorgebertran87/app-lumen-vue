<?php

declare(strict_types=1);

namespace Src\Infrastructure;

use DI\ContainerBuilder;
use Exception;
use Src\Application\QueryBus as QueryBusInterface;
use Throwable;

class QueryBus implements QueryBusInterface
{
    protected $container;

    /** @throws Exception */
    public function __construct()
    {
        $builder = new ContainerBuilder();
        $builder->useAutowiring(true);
        $builder->useAnnotations(false);

        $this->container = $builder->build();
    }

    /** @return mixed */
    public function handle($query)
    {
        $handlerClass = get_class($query).'Handler';
        try {
            $handler = $this->container->get($handlerClass);
            return $handler->handle($query);
        } catch(Throwable $e) {
            return null;
        }
    }
}