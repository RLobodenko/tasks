<?php
    $host = 'localhost';
    $user = 'root';
    $password_db = 'root';
    $db_name = 'task4';
    
    $con = new mysqli($host, $user, $password_db, $db_name);
    if($con->connect_error){
        echo 'Error DB';
    }

?>
