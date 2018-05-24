<?php
  namespace App\Auth;

  use App\Models\User;

  class Auth {
    function attempt($username, $password) {
      $user = User::where('username', $username)->first();
      if ($user && password_verify($password, $user->password)) {
        $_SESSION['uid'] = $user->id;
        return true;
      }
      return false;
    }

    function check() {
      return isset($_SESSION['uid']);
    }

    static function logout() {
      if (isset($_SESSION['uid'])) {
        unset($_SESSION['uid']);
      }
    }
  }