<?php
session_start();
require_once 'db.php';
if(isset($_POST['btn_auth'])){
    $name = $_POST["firstname"];
    $password = md5($_POST["password"]);
    
    
    
    
    
    if($con->connect_error){
        echo 'Error DB';
    }else{
        $q = $con->query("select * from users where login = '$name' and password = '$password' and status = 1");
        if($q->num_rows == 1){
            $_SESSION['login'] = $name;
            header('Location: 8-1.php');
        }else{
            header('Location: 8-1.php?error=1');
        }
    }
}
?>
