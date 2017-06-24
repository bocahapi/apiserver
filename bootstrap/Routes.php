<?php
namespace {

    use Psr\Http\Message\ResponseInterface;
    use Psr\Http\Message\ServerRequestInterface;

    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
        return "im ok";
    });

    // method GET
    $app->get('/users[/]', 'Users:index');
    $app->get('/users/{id:[0-9]+}', 'Users:getUser');

    // method POST
    $app->post('/user[/]', 'Users:addUser');

    // method PUT
    $app->post('/user/{id:[0-9]+}', 'Users:update');

    // method DELETE
    $app->delete('/user/{id:[0-9]+}', 'Users:delete');

}
