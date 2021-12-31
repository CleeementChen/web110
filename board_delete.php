<?php include "session_check.php"; ?>
<?php

    $id = $_GET['id'];
    $pdo=new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');
    $sql=$pdo->prepare("update advertisement set status=? where id='$id'");

    $sql->execute([0]);

    header("location:index.php?method=board");
    

?>