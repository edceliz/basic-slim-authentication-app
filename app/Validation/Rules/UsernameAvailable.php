<?php
  namespace App\Validation\Rules;

  use Respect\Validation\Rules\AbstractRule;
  use App\Models\User;

  class UsernameAvailable extends AbstractRule {
    function validate($input) {
      return !((bool) User::where('username', $input)->count());
    }
  }