<?php

class Movie {
    public function getMovie($title) {
        $query_url = "http://www.omdbapi.com/?apikey=" . $_ENV['omdb_Key'] . "&t=" . urlencode($title);
        $json = file_get_contents($query_url);
        $phpObj = json_decode($json, true); // Decode as associative array
        return $phpObj;
    }
}
?>
