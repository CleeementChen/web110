<?php session_start();?>
<!doctype html>
<html lang="en">
    <?php
    $method = $_GET['method'];
    if(isset($_SESSION["account"]["account_id"])){
        switch($method)
        {
            case "home":include "home.php"; break;
            case "appointment":include "appointment.php";break;
            case "board":include "board.php";break;
            case "profo":include "profo.php";break;
            case "key_profo":include "key_profo.php";break;
            case "e-chart":include "e-chart.php";break;
            default: include "home.php";
        }
    }else{
        echo '<script>window.location="login.php";</script>';
    }
    ?>
</html>