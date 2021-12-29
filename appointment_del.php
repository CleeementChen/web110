<?php
    session_start();

    $today = date('Y-m-d');
    $id = $_GET['id'];
    $status = $_SESSION['account']['status'];
    $result = "";
    $pdo = new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');

    $sql = $pdo->query("select a_time from appointment_record where id = '$id' ");

    foreach($sql as $sql){
        $a_time = $sql['a_time'];
    }

    $sql2 = $pdo->prepare("update appointment_record set status = ? where id = '$id' ");

    if($a_time >= $today){
        $sql2->execute(['已取消']);
        $result = "inn_true";
    }else{
        if($status == '管理者'){
            $sql2->execute(['已取消']);
            $result = "inn_true";
        }else{
            $result = "inn_false";
        }
    }

    $sql = NULL;
    $sql2 = NULL;

    header('location:index.php?method=message&message='.$result);
?>