<?php

class Login extends Controller {

    public function index() {		
	    $this->view('login/index');
    }
    
    public function verify(){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			//private $errorCount = 0;
		
			$user = $this->model('User');
			$user->authenticate($username, $password);

			
    }

}
