<?php
  $app->get('/', 'HomeController:index');
  $app->get('/register', 'AuthController:getRegister');

  $app->post('/register', 'AuthController:postRegister');