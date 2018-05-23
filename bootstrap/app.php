<?php
  use Respect\Validation\Validator;

  session_start();
  require_once(__DIR__ . '/../vendor/autoload.php');


  $container = new Slim\Container();
  $container->settings['displayErrorDetails'] = true;
  $container->settings['db'] = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'practice_slim',
    'username' => 'root',
    'password' => 'notroot'
  ];
  
  $capsule = new Illuminate\Database\Capsule\Manager;
  $capsule->addConnection($container->settings['db']);
  $capsule->setAsGlobal();
  $capsule->bootEloquent();

  $container['db'] = function ($container) use ($capsule) {
    return $capsule;
  };

  $container['view'] = function ($container) {
    $view = new Slim\Views\Twig(__DIR__ . '/../resources/views', [
      'cache' => false
    ]);
    $view->addExtension(new Slim\Views\TwigExtension(
      $container->router,
      $container->request->getUri()
    ));
    return $view;
  };

  $container['validator'] = function () {
    return new App\Validation\Validator;
  };

  Validator::with('App\Validation\Rules');

  $container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
  };

  $container['AuthController'] = function ($container) {
    return new App\Controllers\AuthController($container);
  };

  $app = new Slim\App($container);

  require_once(__DIR__ . '/../app/routes.php');