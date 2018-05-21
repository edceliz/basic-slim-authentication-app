<?php
  $app->get('/', 'HomeController:index');

  $app->get('/register', 'AuthController:getRegister');
  $app->post('/register', 'AuthController:postRegister')->setName('auth.register');

  $app->get('/login[/{status}]', 'AuthController:getLogin')->setName('auth.get.login');
  $app->post('/login', 'AuthController:postLogin')->setName('auth.login');