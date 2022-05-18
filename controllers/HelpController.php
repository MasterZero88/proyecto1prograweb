<?php

  // file: controllers/LoginController.php
  
  class HelpController extends Controller {

    public function index() {
      return view('help/index',
        ['login'=>Auth::check()]);
    }

  }
?>
