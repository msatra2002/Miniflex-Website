<?php

class Omdb extends Controller {

    public function index() {
        // Display the search form
        $this->view('omdb/index');
    }

    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['movie_name'])) {
            $movieName = $_REQUEST['movie_name'];
            $omdb = $this->model('Movie');

            $movie = $omdb->getMovie($movieName);
            $movie = $omdb -> getReview($movieName);
            // Pass data to the view
            $this->view('omdb/result', ['movie' => $movie]);
        } else {
            // Redirect to the index page if not a POST request
            header('Location: /omdb');
            exit;
        }
    }
}

