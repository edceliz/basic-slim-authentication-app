<?php
  namespace App\Controllers;

  use App\Models\User;

  class AuthController extends Controller {
    function getRegister($req, $res) {
      return $this->view->render($res, 'register.html');
    }

    function postRegister($req, $res) {
      User::create([
        'username' => $req->getParam('username'),
        'password' => PASSWORD_HASH($req->getParam('password'), PASSWORD_DEFAULT)
      ]);
      return $res->withRedirect($this->router->pathFor('auth.get.login'));
    }

    function getLogin($req, $res, $args) {
      return $this->view->render($res, 'login.html', ['status' => isset($args['status'])]);
    }

    function postLogin($req, $res) {
      $user = User::where('username', $req->getParam('username'))->first();
      if ($user) {
        var_dump(password_verify($req->getParam('password'), $user->password));
      } else {
        return $res->withRedirect($this->router->pathFor('auth.get.login') . '/error');
      }
    }
  }