<?php
  namespace App\Controllers;

  class Controller {
    protected $container;

    function __construct($container) {
      $this->container = $container;
    }

    function __get($property) {
      return $this->container->{$property} ?: false;
    }
  }