<?php
    session_start();

    $id = $_GET['id'];
    $status = $_SESSION['account']['status'];
    $result = "";
    $pdo = new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');

    $sql2 = $pdo->prepare("update appointment_record set status = ? where id = '$id' ");

    $sql2->execute(['完成']);
    $result = "checkit";

    $sql = NULL;
    $sql2 = NULL;

    header('location:index.php?method=message&message='.$result);
?>