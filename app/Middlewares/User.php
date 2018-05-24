<?php
  namespace App\Middlewares;

  class User extends Middleware {
    function __invoke ($req, $res, $next) {
      if ($this->container->auth->check()) {
        $this->container->view->getEnvironment()->addGlobal('user', $_SESSION['uid']);
      }
      return $next($req, $res);
    }
  }