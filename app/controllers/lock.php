<?php

class Lock extends Controller {

  public function index(){
    $this->view('lock/index');
  }

  public function verify(){
 
    unset($_SESSION['failedAuth']);
    header('Location: /login');

  }

}