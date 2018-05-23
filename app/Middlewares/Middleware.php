<?php
  namespace App\Middlewares;

  class Middleware {
    protected $container;

    function __construct($container) {
      $this->container = $container;
    }
  }