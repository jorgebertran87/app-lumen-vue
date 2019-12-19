<?php

declare(strict_types=1);

namespace Src\Application;

use DI\ContainerBuilder;
use Exception;
use Throwable;

class QueryBus
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

    /**
     * @return mixed
     * @throws QueryException
     */
    public function handle($query)
    {
        $handlerClass = get_class($query).'Handler';
        try {
            $handler = $this->container->get($handlerClass);
            return $handler->handle($query);
        } catch(Throwable $e) {
            throw QueryException::fromQuery(get_class($query), $e);
        }
    }
}