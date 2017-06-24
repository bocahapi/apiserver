<?php
namespace {

    use App\Controller\Users;
    use Illuminate\Database\Capsule\Manager;
    use Slim\App;

    if (!isset($app) || !$app instanceof App) {
        return;
    }

    $container = $app->getContainer();
    $capsule = new Manager();
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    $container['db'] = function ($container) use($capsule){
        return $capsule;
    };

    $container['Users'] = function ($container) {
        return new Users($container);
    };
//    BaseController::setContainer($container);
}