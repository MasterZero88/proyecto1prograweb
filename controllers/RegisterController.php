<?php

  // file: controllers/RegisterController.php  
  require_once('User.php');
  
  class RegisterController extends Controller {
      
    public function showRegistrationForm() {
      return view('user/registration',
        ['login'=>Auth::check()]); 
    }

    public function register() {
      $name = Input::get('name');  
      $lastname = Input::get('lastname');  
      $email = Input::get('email');  
      $password = Input::get('password');
      $user = [
        'name'=>$name,'lastname'=>$lastname,'email'=>$email,  
        'password'=>$password];
        Users::create($user);
      return redirect('/');
    }
  }
?>
