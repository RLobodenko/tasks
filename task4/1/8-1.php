<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Авторизация</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/cerulean/bootstrap.min.css">
<meta charset="utf-8">
</head>
<body>
    <?php
    if(isset($_SESSION['login'])){
        ?>
        <p>
            Вы успешно авторизовались, <?=$_SESSION['login']?>
            <a href="logout.php">Выход</a>
        </p>
        <?php require_once '6.php'; ?>
        <?php
    }else{
    ?>
    <?php 
        if(isset($_GET['error']) && $_GET['error'] == 1){
            ?>
            <p>Ошибка авторизации</p>
            <?php 
        }
    ?>
    <h1>Авторизация </h1>
    <h2>Введи свои данные:</h2>
    <form action="8.php" method="POST">
        <p>Введите логин: <input type="text" name="firstname" /></p>
        <p>Введите пароль: <input type="text" name="password" /></p>
        <input type="submit" value="Отправить" name="btn_auth">
    </form>
    <?php 
    }
    ?>
</body>
</html>
