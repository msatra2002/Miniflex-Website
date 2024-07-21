<?php

class reports extends Controller {

  /**
   *  @return void
   */
    public function index(){
      
      $user = $this->model('User');
      //$data = $user->test();
      $reminder = $this->model('reminder');
      //$list_of_reminders = $reminder->get_all_reminders_Admin();
      $list_of_reminders = $reminder->getEmAll();
      //$this->view('reports/index', ['reminders' => $list_of_reminders]);
      $this->view('reports/index', ['reminders' => $list_of_reminders , 'most' => $reminder->getMostRminders() ,'most1' => $reminder->getemRminders() ,'most2' => $user->getemUsers() ]);
      
      

    }
    // public function create(){

    //   $this->view('reports/create');

    // }
    // public function change(){}
    // public function update(){}
    // public function delete(){}
  
  

}
?>