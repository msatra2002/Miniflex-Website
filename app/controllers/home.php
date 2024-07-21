<?php

class Home extends Controller {

  /**
   *  @return void
   */
    public function index(){
      $user = $this->model('User');
      //$data = $user->test();
			
	    $this->view('home/index');
	  
    }

}
?>
