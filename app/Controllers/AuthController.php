<?php
  namespace App\Controllers;

  use App\Models\User;
  use Respect\Validation\Validator as v;

  class AuthController extends Controller {
    function getRegister($req, $res) {
      return $this->view->render($res, 'register.html');
    }

    function postRegister($req, $res) {
      $validation = $this->validator->validate($req, [
        'username' => v::noWhiteSpace()->notEmpty()->usernameAvailable(),
        'password' => v::noWhiteSpace()->notEmpty()
      ]);
      if (!$validation->failed()) {
        User::create([
          'username' => $req->getParam('username'),
          'password' => PASSWORD_HASH($req->getParam('password'), PASSWORD_DEFAULT)
        ]);
      } else {
        return $res->withRedirect($this->router->pathFor('auth.register'));
      }
      return $res->withRedirect($this->router->pathFor('auth.get.login'));
    }

    function getLogin($req, $res, $args) {
      return $this->view->render($res, 'login.html');
    }

    function postLogin($req, $res) {
      $user = User::where('username', $req->getParam('username'))->first();
      $validation = $this->validator->validate($req, [
        'username' => v::noWhiteSpace()->notEmpty(),
        'password' => v::noWhiteSpace()->notEmpty()
      ]);
      if ($user && !$validation->failed()) {
        var_dump(password_verify($req->getParam('password'), $user->password));
      } else {
        return $res->withRedirect($this->router->pathFor('auth.get.login'));
      }
    }
  }