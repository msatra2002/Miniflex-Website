<?php

class Reminders extends Controller {

    public function index() {		
      $userId = $_SESSION['userid'];
      //echo $userId;
      $reminder = $this->model('reminder');
      $list_of_reminders = $reminder->get_all_reminders($userId);  
$this -> view('reminders/index', ['reminders' => $list_of_reminders]);
    }

   public function create() {		
        $reminder = $this->model('reminder');  
  $this -> view('reminders/create');
      }
  public function change() {		
    $subject = $_REQUEST['subject'];
    $userId = $_SESSION['userid'];
    
    //private $errorCount = 0;

    $reminder = $this->model('reminder');
    $reminder->add($userId , $subject);
    
    
    $this -> view('reminders/index', ['reminders' => $reminder->get_all_reminders($userId)]);
    
    
    
  }
  
  public function update() {		
    $reminder_id = $_REQUEST['id'];
    $subject = $_REQUEST['subject'];
    
    
    $reminder = $this->model('reminder'); 
    $this -> view('reminders/update', ['reminder_id' => $reminder_id, 'subject' => $subject]);
      }
  public function rechange(){
    $reminder_id = $_REQUEST['id'];
    $subject = $_REQUEST['subject2'];
    $userId = $_SESSION['userid'];
    
    
    
    //private $errorCount = 0;

    $reminder = $this->model('reminder');
    $reminder->update_reminder($subject, $reminder_id);
    
    
    $this -> view('reminders/index', ['reminders' => $reminder->get_all_reminders($userId)]);
    
    


    
  }
  public function delete() {	
    $userId = $_SESSION['userid'];
    $reminderId = $_REQUEST['id'];
        $reminder = $this->model('reminder'); 
      $reminder->remove($reminderId );
    
    $this -> view('reminders/index', ['reminders' => $reminder->get_all_reminders($userId)]);

  
      }
}