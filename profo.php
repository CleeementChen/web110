<?php include "header.php"; ?>
<?php include "band.php"; ?>
<?php
    session_start();
    $account_id = $_SESSION['account']['account_id'];
    $name = $_SESSION['account']['name'];
    $phone = $_SESSION['account']['phone'];
    $status = $_SESSION['account']['status'];

    $pdo = new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8', 'root', '');
?>

<style>
    .change-pass{
        width: 120px;
        height: 50px;
        text-align: center;
        font-size: 18px;
        line-height: 28px;
        text-align: center;
        border-radius: 25px;
        margin: 20px;
        padding: 10px;
        background: #4e73df;
        text-decoration: none;
        outline: none;
        color: #fff;
        border: solid #4e73df;
    }

    .outer a{
        outline: none;
        text-decoration: none;
    }
</style>

<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">個人資料</h1>
    </div>

    <div class="col-lg-12 row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                        <div class="col ml-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                姓名
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $name; ?></div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
                        </div>
                        <div class="col ml-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                手機號碼
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $phone; ?></div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-hotel fa-2x text-gray-300"></i>
                        </div>
                        <div class="col ml-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                訂房次數
                            </div>
                            <?php
                                $sql = $pdo->query("select count(id) from appointment_record 
                                    where status = '完成' and account_id = '$account_id' ");
                                foreach($sql as $sql){
                                    $sql = $sql['count(id)'];
                                }
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sql; ?></div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                        <div class="col ml-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                最近一次入住
                            </div>
                            <?php
                                $sql2 = $pdo->query("select max(d_time) from appointment_record
                                    where status = '完成' and account_id = '$account_id'");
                                foreach($sql2 as $sql2){
                                    $sql2 = $sql2['max(d_time)'];
                                }
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sql2; ?></div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    

</div>


<div class="outer">
<center>
    <a href="change_password.php?id=<?php echo $account_id; ?>"><div class="change-pass">更改密碼</div></a>
</center>
</div>



<?php include "footer.php"; ?>

