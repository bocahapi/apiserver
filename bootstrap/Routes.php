<?php
$container = $app->getContainer();
$app->get('/', function($request, $response) {
	return "im ok";
});

$user = new \App\Controller\Users();

$app->get('/all', [ $user, 'index']);
