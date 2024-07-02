<?php
    require_once 'db.php';

    if(isset($_POST['delete'])){
        $ids = $_POST['id'];
        foreach($ids as $id){
            $con->query("delete from users where id = '$id'");
        }
        header('Location: 8-1.php');
    }
    if(isset($_POST['block'])){
        $ids = $_POST['id'];
        foreach($ids as $id){
            $con->query("update users set status = 0 where id = '$id'");
        }
        header('Location: 8-1.php');
    }
    if(isset($_POST['unblock'])){
        $ids = $_POST['id'];
        foreach($ids as $id){
            $con->query("update users set status = 1 where id = '$id'");
        }
        header('Location: 8-1.php');
    }

    $users = $con->query('select id,login,name,email,status from users');
    $users_f = [];
    while($row = $users->fetch_assoc()){
        $users_f[] = $row;
    }    
?>
<style>
th,td{
    padding: 10px
}
</style>
<form method="post">
    
    <table border="1" cellpadding=0 cellspacing=0 align="center">
        <tr>
            <th>
                <button name="delete">Удалить</button><br />
                <button name="block">Заблокровать</button><br />
                <button name="unblock">Разблоктровать</button>
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
