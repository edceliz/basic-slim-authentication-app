<?php
  $app->get('/', 'HomeController:index');

  $app->get('/register', 'AuthController:getRegister')->add(new App\Middlewares\ValidationErrors($container));
  $app->post('/register', 'AuthController:postRegister')->setName('auth.register');

  $app->get('/login', 'AuthController:getLogin')->setName('auth.get.login')->add(new App\Middlewares\ValidationErrors($container));
  $app->post('/login', 'AuthController:postLogin')->setName('auth.login');