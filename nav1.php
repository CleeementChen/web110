<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>聖心教學旅館</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="img/school.png" rel="icon"><!--Font awesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body id="page-top">

    <style>
       
        .title-background{
            width: 100%;
            height: 200px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);

            background-size: cover;
            background-position: center center;
            background-image: url(img/background.jpg);
            opacity: 0.75;
        }

        .titre{
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="key_home.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-church"></i>
                    <div class="sidebar-brand-text mx-3">聖心教學旅館</div>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="key_home.php">
                    <i class="far fa-map"></i>
                    <span>首頁</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="key_appointment.php">
                    <i class="far fa-calendar-check"></i>
                    <span>預約訂房</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="key_board.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>公告區</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="e-chart.php">
                <i class="fas fa-chart-line"></i>
                    <span>報表</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading mt-2 mb-2">個人設定</div>

            <li class="nav-item">
                <a class="nav-link" href="key_profo.php">
                    <i class="fas fa-user"></i>
                    <span>個人帳號</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-power-off"></i>
                    <span>登出</span></a>
            </li>

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