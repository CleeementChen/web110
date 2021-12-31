<?php session_start();?>
<!doctype html>
<html lang="en">
    <?php
    $method = $_GET['method'];
    if(isset($_SESSION["account"]["account_id"])){
        switch($method)
        {
            case "home":include "home.php"; break;    //主畫面
            case "appointment":include "appointment.php";break;   //預約訂房畫面
            case "board":include "board.php";break;   //公告畫面
            case "profo":include "profo.php";break;   //使用者資料畫面
            case "key_profo":include "key_profo.php";break;   //管理者資料及新增新管理者
            case "message":include "message.php";break;        //訊息回覆畫面(如:表單結果)
            case "e-chart":include "e-chart.php";break;         //圖示報表
            default: include "home.php";      
        }
    }else{
        echo '<script>window.location="login.php";</script>';
    }
    ?>
</html>