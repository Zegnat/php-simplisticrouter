# SimplisticRouter

The simplest of routers, just what I needed. When everything else seems to 
offer more functions than I need for a minimum viable product.

For anything more than an MVP, I am a really big fan of [FastRoute][] and 
projects like [Route][] that make use of it.

[FastRoute]: https://github.com/nikic/FastRoute
[Route]: https://route.thephpleague.com/

## Install

Via Composer

``` bash
$ composer require zegnat/simplistic-router
```

## Usage

``` php
$handlers = new \Yuloh\Container\Container();
$handlers->set('index', function () {
    return new \App\SomeIndexControllerPerhaps();
});
$handlers->set('404', function () {
    return new \App\My404Handler();
});
$routes = [
    [
        'route' => '/',
        'handler' => 'index',
    ],
];
$router = new \Zegnat\SimplisticRouter\SimplisticRouter($routes, '404', $handlers);
$response = $router->handle($request);
```

## License

The BSD Zero Clause License (0BSD). Please see the LICENSE file for more 
information.
