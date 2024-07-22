<?php

class Home extends Controller {

  /**
   *  @return void
   */
    public function index(){
      if (!isset($_SESSION['auth'])) {
          header('Location: /login');
      }else{
      $user = $this->model('User');
        $omdb = $this->model('Movie');


        $ratedMovies = $omdb->getUserRatedMovies($_SESSION['userid']);

			
	    $this->view('home/index',['ratedMovies' => $ratedMovies]);
      }
    }
  // public function ratedMovies() {
  //     if (isset($_SESSION['userid'])) {
  //       $omdb = $this->model('Movie');


  //       $ratedMovies = $omdb->getUserRatedMovies($_SESSION['userid']);
  //         // $ratedMovies = $movieModel->getUserRatedMovies($_SESSION['userid']);

  //         // Pass data to the view
  //         $this->view('omdb/ratedMovies', ['ratedMovies' => $ratedMovies]);
  //     } else {
  //         // Redirect to login if the user is not authenticated
  //         header('Location: /home');
          
  //     }
  // }
  
    

}
?>
