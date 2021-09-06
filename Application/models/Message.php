<?php

class Message extends Loader {

    // the connection is created in the Loader class constructor. accessed by: $this->conn;
    
    public function insertMessage($message){

        $sql = "INSERT INTO messages(name,email,message) VALUES(:name,:email,:message)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':name', $message['name']);
        $stmt->bindParam(':email', $message['email']);
        $stmt->bindParam(':message', $message['message']);

        $stmt->execute();

    }

}

?>