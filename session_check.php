<?php
    session_start();

    if(!isset($_SESSION['account'])){
        header("location:login.php");
    }
?>