<?php
require_once 'db.php';

 if(isset($_POST['delete'])){
        $ids = $_POST['id'];
        foreach($ids as $id){
            $con->query("delete from users where id = '$id'");
        }
      
        
    }
    

 $users = $con->query('select id,login,name,email,status from users');
    $users_f = [];
    while($row = $users->fetch_assoc()){
        $users_f[] = $row;
    }    
?>
<?php

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
            
        }else{
            $q = $con->query("insert into users (login, password,name,email) values ('$login', '$password','$name', '$email')");
            
        }
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/cerulean/bootstrap.min.css">
<meta charset="utf-8">

    
    <h2>Добавить данные:</h2>
    <form action="6.php" method="POST">
        <p>Введите имя: <input type="text" name="name" required/></p>
        <p>Введите email: <input type="email" name="email" required/></p>
        <p>Введите логин: <input type="text" name="firstname" required/></p>
        <p>Введите пароль: <input type="password" name="password" required/></p>
        <input type="submit" value="Отправить" name="btn_reg">
    </form>
    <style>
th,td{
    padding: 10px
}
button {
    background-color: purple;
}
</style>
<form method="post">
    
    <table border="1" cellpadding=0 cellspacing=0 align="center">
        <tr>
            <th>
                <button name="delete">Удалить</button><br />
                
           </th>
            <th>ID</th>
            <th>Login</th>
            <th>Name</th>
            <th>Email</th>
            <th>Статус</th>
        </tr>
        <?php foreach($users_f as $us){ ?>
            <tr>
                <td>
                    <input type='checkbox' name='id[]' value="<?=$us['id']?>">
                </td>
                <td><?=$us['id']?></td>
                <td><?=$us['login']?></td>
                <td><?=$us['name']?></td>
                <td><?=$us['email']?></td>
                <td>
                    <?php if($us['status'] == 0){ ?>
                         Заблокирован
                    <?php }else{ ?>
                        Активный
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</form>
<br>
<br>
   