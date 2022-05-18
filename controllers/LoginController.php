<?php

  // file: controllers/LoginController.php
  require_once('User.php');
  
  class LoginController extends Controller {

    public function showLoginForm() {
      return view('login/index',
        ['error'=>false,'login'=>Auth::check()]);
    }

    public function login() {
      $email = Input::get('email');   
      $password = Input::get('password');
      if (Auth::attempt(['email' => $email,
        'password' => $password])) {
        
         // Cookie:queue($key,$value)
        return redirect('/webmedia');
      }
      return redirect('/loginFails');
    }
    
    public function loginFails() {
      return view('login/index',
        ['error'=>true,'login'=>Auth::check()]);
    }

    public function logout() {
      Auth::logout();
      return redirect('/');
    }
  }
?>
