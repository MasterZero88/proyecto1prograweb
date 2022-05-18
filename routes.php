<?php


    Route::resource('/','LoginController@showLoginForm',['title'=>'Welcome','login'=>Auth::check()]);

    Route::get('/', function () { return view('home',
      ['title'=>'Welcome','login'=>Auth::check()]); });
  // Authentication Routes  
  Route::get('loginFails', 'LoginController@LoginFails');           
  Route::post('login', 'LoginController@login');  
  Route::get('logout', 'LoginController@logout');  

    // Registration Routes  
    Route::get('register', 'RegisterController@showRegistrationForm');  
    Route::post('register', 'RegisterController@register');
    // web media routes
    Route::get('webmedia', 'WebMediaController@index');  
    Route::get('webmedia/share', 'WebMediaController@shareIndex');  
    Route::get('webmedia/search', 'WebMediaController@searchIndex');  
    Route::post('createShare', 'WebMediaController@createShare');
    Route::post('searchMedia', 'WebMediaController@searchMedia');

    Route::get('help', 'HelpController@index');  



    Route::dispatch();
?>
