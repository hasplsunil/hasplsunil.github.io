<?php

require_once 'source/db2_connect.php';

if(isset($_post['button2'])) {

       $username = $_POST['user-name'];
       $email = $_POST['user-email'];
       $password = $_POST['user-pass'];

       $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
           
             
             $SQLInsert = "INSERT INTO users (username, password, email, to_date)
                           VALUES (:username, :password, :email, now())";

             $statement = $conn->prepare($SQLInsert);
             $statement->execute(array(':username' => $username, ':password' => $hashed_password, 'email' => $email));

             if($statement->rowCount() == 1) {
                $result = header('location: thankyou.html');
             }
          }


        catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }


}


?>