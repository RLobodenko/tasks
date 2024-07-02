<?php
require_once 'db.php';
if(isset($_POST['btn_reg'])){
    $login = $_POST["firstname"];
    $password = md5($_POST["password"]);
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    
    if($con->connect_error){
        echo 'Error DB';
    }else{
        $auth_login = $con->query("select * from users where login = '$login'");
        if($auth_login->num_rows > 0){
            echo 'Пользователь с таким логинов уже зарегистрирован! <a href="6.php">Регистрация</a>';
        }else{
            $q = $con->query("insert into users (login, password,name,email) values ('$login', '$password','$name', '$email')");
            if($q){
                echo 'Вы успешно зарегистрированы!';
                echo '<a href="/8-1.php">Авторизация</a>';
            }else{
                echo  'Ошибка регистрации!';
            }
        }
    }
}
?>
