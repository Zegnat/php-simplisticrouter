<?php

declare(strict_types=1);

namespace Zegnat\SimplisticRouter;

use Interop\Http\Server\RequestHandlerInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

final class SimplisticRouter implements RequestHandlerInterface
{
    private $routes;
    private $404;
    private $service_locator;

    public function __constructor(array $routes, string $404, ContainerInterface $service_locator)
    {
        $this->routes = $routes;
        $this->404 = $404;
        $this->service_locator = $service_locator;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path = $request->getUri()->getPath();
        foreach ($routes as $route) {
            if ($route['path'] === $path) {
                return $service_locator->get($route['handler'])->handle($request);
            }
        }
        return $service_locator->get($this->404)->handle($request);
    }
}
