<?php include "header.php"; ?>
<?php include "band.php"; ?>
<?php

$account_id = $_SESSION['account']['account_id'];
$name = $_SESSION['account']['name'];
$phone = $_SESSION['account']['phone'];
$status = $_SESSION['account']['status'];

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

<script>
    $('form').on('submit', function () {
        //送出表單前會觸發這部分
        $.ajax({
            url: 'key_profo_output.php',      //要傳送的頁面
            method: 'post',
            dataType: 'json',           //回傳資料是json格式
            data: $('form').serialize(), //將表單資料用打包起來送出去
            success: function (res) {
                //成功之後會執行這個方法
                if (res.success == true) {
                    Swal.fire({
                        allowOutsideClick: false,
                        icon: 'success',
                        html:
                            '<b>新增成功</b>',
                        focusConfirm: false,
                        confirmButtonText:
                            '<b style="color:white;text-decoration:none;">確定</b>',
                        confirmButtonAriaLabel: '確定',
                        confirmButtonClass: 'insert_button'
                    }).then((result) => {                   /*是否確定*/
                        if (result.isConfirmed) {
                            document.location.href = "index.php?method=profo";   /*確認轉址 */
                        }
                    });
                } else {

                    Swal.fire({
                        icon: 'error',
                        html:
                            '<b>' + res.checked + '</b>',
                        confirmButtonAriaLabel: '確定',
                        confirmButtonClass: 'insert_button',
                        confirmButtonText: '<b style="color:white;text-decoration:none;">確定</b>'
                    })
                }
            },
        });
        return false; //阻止瀏覽器轉跳到 send.php，因為已經用ajax送出去了
    })
</script>

<?php
if($status == '使用者'){
?>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
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
                                最近一次訂房紀錄
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2021/09/28</div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    

</div>

<?php
}else{
?>

<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">個人資料</h1>
    </div>

    <center><h1>歡迎管理者 <?php echo $_SESSION['account']['name']; ?></h1></center>
    <style>
        select,
        input[type="text"],
        input[type="password"] {
            width: 100%;
            height: 50px;
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: solid #4e73df;
            outline: none;
            margin: 10px;
        }

        .text-alter p {
            color: #000;
            font-size: 18px;
        }

        .sub button {
            width: 80px;
            height: 50px;
            border: 1px solid;
            background: #4e73df;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }

        .sub button :hover {
            border-color: #2691d9;
            transition: .5s;
        }

        .sub {
            margin: 30px;
        }
    </style>

    
    <div class="card mt-4 mb-4 py-3 border-bottom-primary">
        <p class="ml-3">新增管理帳號</p>
        <div class="card-body text-alter">
            <center>
                <form action="key_profo_output.php" method="post">
    
                    <div class="col-lg-12 row mt-1">
                    <div class="col-lg-3 mb-3">
                            <p class="ml-2">名稱</p>
                            <input type="text" maxlength="15" name="name" required>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <p class="ml-2">帳號</p>
                            <input type="text" maxlength="15" name="account_id" required>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <p class="ml-2">手機</p>
                            <input type="text" maxlength="10" name="phone" required>
                        </div>
                        <div class="col-lg-3">
                            <p class="ml-2">密碼</p>
                            <input type="password" maxlength="15" name="password" required>
                        </div>
                        <div class="col-lg-3">
                            <p class="ml-2">確認密碼</p>
                            <input type="password" maxlength="15" name="password2" required>
                        </div>
                        
                    </div>

                    <div class="sub mt-5"><button type="submit">新增</button></div>
                </form>
            </center>
        </div>
    </div>

</div>

<?php
}
?>


<div class="outer">
<center>
    <a href="change_password.php?id=<?php echo $account_id; ?>"><div class="change-pass">更改密碼</div></a>
</center>
</div>



<?php include "footer.php"; ?>

