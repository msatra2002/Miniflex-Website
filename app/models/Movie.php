<?php

class Movie {
    public function getMovie($title) {
        $query_url = "http://www.omdbapi.com/?apikey=" . $_ENV['omdb_Key'] . "&t=" . urlencode($title);
        $json = file_get_contents($query_url);
        $phpObj = json_decode($json, true); // Decode as associative array

        $movie = (array) $phpObj;
        return $movie;
    }

    public function getReview($movie_name){
        
        $movie_name = $this -> getMovie($movie_name);
        
                $url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=".$_ENV['GEMINI'];

                $data = array(
                    "contents" => array(
                        array(
                            "role" => "user",
                                "parts" => array(
                                array(
                                      "text" => 'Please give a review of '.$movie_name['Title'] .'based on what you think about it. also give a rating out of 5.'
                                  )
                              )
                          )
                      )
                  );
                $json_data = json_encode($data);
                  $ch = curl_init($url);
                  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                  $response = curl_exec($ch);
                  curl_close($ch);
                if (curl_errno($ch)) {
                    echo 'Curl error: ' . curl_error($ch);
                } else {
                    $response = json_decode($response, true);  

                   
                    if (isset($response['candidates'][0]['content']['parts'][0]['text'])) {
                        $reviewText = $response['candidates'][0]['content']['parts'][0]['text'];
                    } else {
                       
                        $_SESSION['review'] = "There was an issue retrieving the review. Please try again later.";
                        return $movie_name;
                    }

                    
                       //fix up some of the ai review punctuation issues. extra commas and stars.
                        $formattedReview = str_replace("Array", ucwords($movie_title), $reviewText);

                      
                        $cleanReview = strip_tags($formattedReview);
                        $cleanReview = str_replace('*', '', $cleanReview);

                        $_SESSION['review'] = $cleanReview;
                        return $movie_name;

                    
                

            

            


        }
    }
}
?>
