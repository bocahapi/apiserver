<?php
namespace {

    use App\Controller\BaseController;
    use App\Controller\Users;
    use App\Models\User;
    use Illuminate\Database\Capsule\Manager;
    use Interop\Container\ContainerInterface;
    use Slim\App;

    if (!isset($app) || !$app instanceof App) {
        return;
    }
    $container = $app->getContainer();
    $capsule = new Manager();
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    $container['db'] = function () use($capsule){
        return $capsule;
    };

    BaseController::setContainer($container);
}