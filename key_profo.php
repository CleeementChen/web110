<?php include "header.php"; ?>
<?php include "band.php"; ?>
<?php
    session_start();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

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

        .sub input[type="submit"] {
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

        .sub input[type="submit"] :hover {
            border-color: #2691d9;
            transition: .5s;
        }

        .sub {
            margin: 30px;
        }
       
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

                    <div class="sub mt-5"><input type="submit" id = "p1" value="新增"></div>
                </form>
                
            </center>
            
        </div>
    </div>

    <div class="outer mt-5">
        <center>
            <a href="change_password.php?id=<?php echo $account_id; ?>"><div class="change-pass">更改密碼</div></a>
        </center>
    </div>

</div>


<?php include "footer.php"; ?>