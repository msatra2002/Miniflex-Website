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
                        $formattedReview = str_replace("Array", ucwords($movie_name['Title']), $reviewText);

                      
                        $cleanReview = strip_tags($formattedReview);
                        $cleanReview = str_replace('*', '', $cleanReview);

                        $_SESSION['review'] = $cleanReview;
                        return $movie_name;

                    
                

            

            


        }
    }

    public function pushRating($rating){
        $db = db_connect();
        $stmt= $db-> prepare("INSERT INTO omdb (usermovie, movie_title, rating) VALUES (:user_id, :movie_id, :rating)");
          $stmt->bindValue(":user_id",$_SESSION['userid']);
          $stmt->bindValue(":rating",$rating);
        $stmt->bindValue(":movie_id",$_SESSION['movie_name']);


        
        $stmt -> execute();
        header('Location: /omdb/result');
    }

    public function pullAvgRating(){
        $db = db_connect();
            $stmt = $db -> prepare("SELECT rating FROM omdb WHERE movie_title = :movie_title");
            $stmt -> bindValue(':movie_title', $_SESSION['movie_name']);
            $stmt -> execute();
            $rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);

            $sum = 0;
            $count = 0;
            foreach( $rows as $row){
                $count ++;
                $sum += $row['rating'];
            }
            if($count != 0){
                $avg = $sum / $count;
            }else{
                $avg = NULL;
            }
            


        $_SESSION['avgRating'] = $avg;
        }
    public function getUserRatedMovies() {
        try {
            $db = db_connect();
            $stmt = $db->prepare("SELECT movie_title, rating FROM omdb WHERE usermovie = :user_id");
            $stmt->bindValue(":user_id", $_SESSION['userid']);
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Post-process to remove duplicates, keeping the highest rating for each movie title
            $uniqueMovies = [];
            foreach ($rows as $row) {
                $title = $row['movie_title'];
                $rating = $row['rating'];

                if (!isset($uniqueMovies[$title]) || $uniqueMovies[$title] < $rating) {
                    $uniqueMovies[$title] = $rating;
                }
            }

            // Transform the associative array back to an indexed array
            $result = [];
            foreach ($uniqueMovies as $title => $rating) {
                $result[] = ['movie_title' => $title, 'rating' => $rating];
            }

            return $result;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }



        
        
    
}
?>
