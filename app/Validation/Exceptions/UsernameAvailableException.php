<?php
  namespace App\Validation\Exceptions;

  use Respect\Validation\Exceptions\ValidationException;

  class UsernameAvailableException extends ValidationException {
    static $defaultTemplates = [
      self::MODE_DEFAULT => [
        self::STANDARD => 'Username is already taken.'
      ]
    ];
  }