<?php
  namespace App\Middlewares;

  class CSRFView extends Middleware {
    function __invoke($req, $res, $next) {
      $this->container->view->getEnvironment()->addGlobal('csrf', [
        'field' => '
          <input type="hidden" name="' . $this->container->csrf->getTokenNameKey() . '" value="' . $this->container->csrf->getTokenName() . '">
          <input type="hidden" name="' . $this->container->csrf->getTokenValueKey() . '" value="' . $this->container->csrf->getTokenValue() . '">
        '
      ]);
      return $next($req, $res);
    }
  }