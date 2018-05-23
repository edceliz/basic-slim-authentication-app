<?php
  namespace App\Validation;

  use Respect\Validation\Validator as Respect;
  use Respect\Validation\Exceptions\NestedValidationException;

  class Validator {
    protected $errors;

    function validate($req, $rules) {
      foreach ($rules as $field => $rule) {
        try {
          $rule->setName(ucfirst($field))->assert($req->getParam($field));
        } catch (NestedValidationException $e) {
          $this->errors[$field] = $e->getMessages();
        }
      }
      $_SESSION['errors'] = $this->errors;
      return $this;
    }

    function failed() {
      return !empty($this->errors);
    }
  }