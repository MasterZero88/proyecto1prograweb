<?php

  // file: controllers/LoginController.php
  require_once('WebMedia.php');
  require_once('User.php');
  require_once('Themes.php');
  
  class WebMediaController extends Controller {

    public function index() {
      $id = Auth::id();
      $myWebMedia = WebMedia::where('destiny',$id);
      return view('webmedia/index',
        ['myWebMedia'=>$myWebMedia,'login'=>Auth::check()]);
    }

    public function shareIndex() {
      return view('webmedia/share',
        ['themes'=>Themes::all(),'users'=>Users::all(),'login'=>Auth::check()]);
    }

    public function searchIndex() {
      return view('webmedia/search',
        ['themes'=>Themes::all(),'login'=>Auth::check()]);
    }

    public function createShare() {
      $origin = Auth::id();
      $title = Input::get('title');  
      $idTheme = Input::get('idTheme');  
      $destiny = Input::get('destiny');  
      $url = Input::get('url');
      $webmediashare = [
        'origin'=>$origin,'destiny'=>$destiny,'title'=>$title,'idTheme'=>$idTheme,  
        'url'=>$url];
        WebMedia::create($webmediashare);
      return redirect('webmedia/share');
    }

    public function searchMedia() {
      $title = Input::get('title');  
      $myWebMedia = WebMedia::where('title',$title);
      return view('webmedia/show',
      ['myMedia'=>$myWebMedia,'login'=>Auth::check()]);
    }

  }
?>
