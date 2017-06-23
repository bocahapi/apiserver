<?php
namespace {

    use Slim\App;

    require_once __DIR__ . '/../vendor/autoload.php';
    $app = new App(require __DIR__ . '/Settings.php');
    require_once __DIR__ . '/Container.php';
    require_once __DIR__ . '/Routes.php';

    return $app;
}
