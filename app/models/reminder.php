<?php

class reminder {
    public $userid;

    public function __construct() {

    }
    public function get_all_reminders($userId) {
    $db = db_connect();
    $statement = $db->prepare("select * from reminders WHERE user_id =:userid");
        $statement->bindValue(":userid",$userId);
        $statement -> execute();
    $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function get_all_reminders_Admin() {
    $db = db_connect();
    $statement = $db->prepare("select * from reminders ");
        
        $statement -> execute();
    $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function getEmAll(){
        $db = db_connect();
        $statement = $db->prepare("Select users.username, reminders.subject, reminders.user_id, reminders.created_at from reminders INNER JOIN users ON reminders.user_id = users.id");
            
            $statement -> execute();
        $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        
    }
    public function getMostRminders(){
        $db = db_connect();
        $statement = $db->prepare("SELECT u.username, COUNT(r.id) AS reminder_count
           FROM reminders r
           JOIN users u ON r.user_id = u.id
           GROUP BY r.user_id
           ORDER BY reminder_count DESC
           LIMIT 1");

            $statement -> execute();
        $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        
    }
    public function getemRminders(){
        $db = db_connect();
        $statement = $db->prepare("SELECT u.username, COUNT(r.id) AS reminder_count
           FROM reminders r
           JOIN users u ON r.user_id = u.id
           GROUP BY r.user_id
           ORDER BY reminder_count DESC");

                    $statement -> execute();
                $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
                    return $rows;
        
    }
    
     public function update_reminder( $subject, $reminder_id) {
     $db = db_connect();
   // //do update statement
         $sql = "UPDATE reminders SET subject = :subject WHERE id = :id";
         $stmt = $db -> prepare($sql);
         $stmt->bindValue(":subject",$subject);
         $stmt->bindValue(":id",$reminder_id);
         //echo $reminder_id; 
         $stmt->execute();
         //echo "done";
         
         
   }
    public function add( $userId , $subject) {
         $db = db_connect();
       // //do update statement
        $sql = "INSERT INTO reminders (user_id , subject) VALUES (? , ?)";
        $stmt = $db -> prepare($sql);
        $stmt->execute([$userId , $subject]);
    
       }
    public function remove( $reminderId ) {
        $db = db_connect();
           // //do update statement
            $sql = "DELETE FROM reminders WHERE (id = :id)";
        
            $stmt = $db -> prepare($sql);
            $stmt->bindValue(":id",$reminderId);
            $stmt->execute();
        
        
           // header('Location: /reminders/index'); idk why this is not working ! 
    }
}
?>
        
