<?php
  namespace App\Controllers;

  use App\Models\User;

  class HomeController extends Controller {
    function index($req, $res) {
      return $this->view->render($res, 'index.html');
    }
  }