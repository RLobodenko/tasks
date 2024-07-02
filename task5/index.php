<?php 
session_start();
require_once 'generate.php';

if(isset($_POST['ok'])){
    $region = $_POST['country'];
    $errorCount = intval($_POST['errors_count']);
    $seed = intval($_POST['seed']);

    $data = generateFakeDate($region,$errorCount,$seed);
    $_SESSION['data'] = json_encode($data);
}
if(isset($_POST['csv'])){
    $data = json_decode($_SESSION['data']);
    $d_new = [];
    foreach($data as $d){
        $d_new[] = ['Number'=>$d->Number, 'Id'=>$d->Id, 'Name'=>$d->Name, 'address'=>$d->address, 'phone'=>$d->phone];
    }
    require_once 'csv.php';
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Генерация</title>
<meta charset="utf-8">
<style>
.row_1{
    display: flex;
    justify-content: center;
    align-items: center;
} 
.wrapper{
    width: 80%;
    margin: auto;
}
</style>
</head>
<body>
   <div class="wrapper">
   <form method="post">
        <div class="row_1">
            
            <div class="region">
                <label>Region</label>
                <select name='country'>
                    <?php
                        if(isset($_POST) && $_POST['country'] == 'USA'){
                    ?>
                    <option value="USA" selected>USA</option>
                    <?php }else{ ?>
                        <option value="USA">USA</option>
                        <?php } ?>
                    <?php
                        if(isset($_POST) && $_POST['country'] == 'UA'){
                    ?>
                    <option value="UA" selected>Украина</option>
                    <?php }else{ ?>
                        <option value="UA">Украина</option>
                        <?php } ?>
                    <?php
                        if(isset($_POST) && $_POST['country'] == 'BY'){
                    ?>
                    <option value="BY" selected>Беларусь</option>
                    <?php } else{?>
                        <option value="BY" >Беларусь</option>
                        <?php }?>
                </select>
            </div>
            <div class="errors">
                <label>Errors</label>
                <?php if (isset($_POST['errors_count'])){ ?>
                <input type='number' name='errors_count' value="<?=$_POST['errors_count']?>">
                    <?php }else{?>
                        <input type='number' name='errors_count' >

                        <?php } ?>
            </div>
            <div class="seed">
                <label>Seed</label>
                <?php if (isset($_POST['seed'])){ ?>
                <input type='number' name='seed' value="<?=$_POST['seed']?>">
                    <?php }else{?>
                        <input type='number' name='seed' >

                        <?php } ?>
            </div>
            <div>
                <button name='csv'>CSV</button>
                <button name='ok'>ОК</button>
            </div>
           
        </div>
   </form>
   </div>
    <?php 
if(isset($_POST['ok'])){
    
   
    ?>
    <div style='overflow-y: scroll;height: 500px'>
    <table border="1" cellpadding=0 cellspacing=0 align="center">
       
        <?php foreach($data as $r){ ?>
            <tr>
                <td><?=$r['Number']?></td>
                <td><?=$r['Id']?></td>
                <td><?=$r['Name']?></td>
                <td><?=$r['address']?></td>
               <td><?=$r['phone']?></td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php
     

    ?>
<?php } 

?>


</body>
</html>
