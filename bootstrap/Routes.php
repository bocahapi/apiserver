<?php
namespace {

    use Psr\Http\Message\ResponseInterface;
    use Psr\Http\Message\ServerRequestInterface;

    $container = $app->getContainer();
    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
        return "im ok";
    });

    $app->map(['GET', 'POST'], '/users[/{id}]', 'Users:index');

}
