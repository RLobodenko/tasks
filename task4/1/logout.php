<?php
session_start();
if(isset($_SESSION['login'])){
    unset($_SESSION['login']);
}
header('Location: 8-1.php');
exit;
?>
