<?php
    session_start();

    if (!isset($method)) {
        $method = $_REQUEST["method"];
    }

    $account_id = $_SESSION['account']['account_id'];

    $pdo = $pdo=new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');
    $sql = $pdo->query("select status from account where account_id = '$account_id'");
                        
    foreach($sql as $sql){
        $status = $sql['status'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>聖心教學旅館</title>

    <?php include "link.html"; ?>
</head>

<body id="page-top">

    <style>
        .title-background {
            width: 100%;
            height: 200px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);

            background-size: cover;
            background-position: center center;
            background-image: url(img/background.jpg);
            opacity: 0.75;
        }

        .titre {
            color: white;
            position: relative;
            top: 60px;
            word-spacing: 10px;
            font-size: 50px;

            border-width: 7px;
            border-style: solid;
            width: 50%;
            background-color: #4e73df;
        }
    </style>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- 導覽列 -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?method=home">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-church"></i>
                    <div class="sidebar-brand-text mx-3">聖心教學旅館</div>
                </div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($method == 'home'){echo " active";}?>">
                <a class="nav-link" href="index.php?method=home">
                    <i class="far fa-map"></i>
                    <span>首頁</span>
                </a>
            </li>

            <li class="nav-item <?php if($method == 'appointment'){echo " active";}?>">
                <a class="nav-link" href="index.php?method=appointment">
                    <i class="far fa-calendar-check"></i>
                    <span>預約訂房</span></a>
            </li>

            <li class="nav-item <?php if($method == 'board'){echo " active";}?>">
                <a class="nav-link" href="index.php?method=board">
                    <i class="fas fa-fw fa-table"></i>
                    <span>公告區</span></a>
            </li>

            <?php
                if($status == '管理者'){

            ?>
            <li class="nav-item <?php if($method == 'e-chart'){echo " active";}?>">
                <a class="nav-link" href="index.php?method=e-chart">
                    <i class="fas fa-chart-line"></i>
                    <span>報表</span></a>
            </li>
            <?php
                 }
            ?>

            <!-- Divider 分隔線-->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading 小標-->
            <div class="sidebar-heading mt-2 mb-2">個人設定</div>

            <li class="nav-item <?php if($method == 'profo'){echo " active";}?>">
                <a class="nav-link" href="index.php?method=profo">
                    <i class="fas fa-user"></i>
                    <span>個人帳號</span></a>
            </li>

            <?php 
            
            if(isset($_SESSION['account']['account_id'])){

            ?>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-power-off"></i>
                    <span>登出</span></a>
            </li>

            <?php
            }
            ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of 導覽列 -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">