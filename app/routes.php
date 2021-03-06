<?php
  $app->get('/', 'HomeController:index')
    ->add(new App\Middlewares\User($container));

  $app->get('/register', 'AuthController:getRegister')
    ->add(new App\Middlewares\ValidationErrors($container))
    ->add(new App\Middlewares\CSRFView($container))
    ->add($container->csrf);
  $app->post('/register', 'AuthController:postRegister')
    ->setName('auth.register')
    ->add($container->csrf);

  $app->get('/login', 'AuthController:getLogin')
    ->setName('auth.get.login')
    ->add(new App\Middlewares\ValidationErrors($container))
    ->add(new App\Middlewares\CSRFView($container))
    ->add($container->csrf);
  $app->post('/login', 'AuthController:postLogin')
    ->setName('auth.login')
    ->add($container->csrf);

  $app->get('/logout', function ($req, $res) {
    App\Auth\Auth::logout();
    return $res->withRedirect('/login');
  });