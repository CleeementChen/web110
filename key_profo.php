<?php include "header.php"; ?>
<?php include "band.php"; ?>
<?php
    session_start();
?>
<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">個人資料</h1>
    </div>

    <center><h1>歡迎管理者 <?php echo $_SESSION['account']['account_id']; ?></h1></center>
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
                <form action="input.php" method="post">
    
                    <div class="col-lg-12 row mt-1">
                    <div class="col-lg-3 mb-3">
                            <p class="ml-2">名稱</p>
                            <input type="text" maxlength="15" name="name">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <p class="ml-2">帳號</p>
                            <input type="text" maxlength="15" name="account_id">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <p class="ml-2">手機</p>
                            <input type="text" maxlength="10" name="account_id">
                        </div>
                        <div class="col-lg-3">
                            <p class="ml-2">密碼</p>
                            <input type="password" maxlength="15" name="password">
                        </div>
                        <div class="col-lg-3">
                            <p class="ml-2">確認密碼</p>
                            <input type="password" maxlength="15" name="password2">
                        </div>
                        
                    </div>

                    <div class="sub mt-5"><button>新增</button></div>
                </form>
            </center>
        </div>
    </div>

</div>
<script>
    function appoint() {
        Swal.fire({
            title: '訂房須知',
            html: '需於三日前訂房；入住當日無法退房；其他請參考首頁',
            icon: "success",
            confirmButtonText: "確定"
        });
    }
<script>

</div>

<?php include "footer.php"; ?>