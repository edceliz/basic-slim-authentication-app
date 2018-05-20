<?php
  namespace App\Controllers;

  class AuthController extends Controller {
    function getRegister($req, $res) {
      return $this->view->render($res, 'register.html');
    }

    function postRegister($req, $res) {
      var_dump($req->getParsedBody());
      die();
    }
  }