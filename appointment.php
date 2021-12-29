<?php include "header.php"; ?>
<?php include "band.php"; ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');
$status = $_SESSION['account']['status'];  //紀錄身分

?>
<style>
    h4{
        margin-left: 3.5rem;
    }
</style>
<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">預約清單</h1>
    </div>
    <div class="row">

        <?php

                if($status == '使用者'){
                    $sql = $pdo->query("select r.id, r.a_time, r.d_time, i.name from appointment_record r, inn i where r.status = '已預訂' and r.account_id = '$account_id' and r.inn_style = i.id");
                    $sql2 = $pdo->query("select r.id, r.a_time, r.d_time, i.name from appointment_record r, inn i where r.status = '已預訂' and r.account_id = '$account_id' and r.inn_style = i.id");  //session有紀錄
                }else{
                    $sql = $pdo->query("select r.id, r.a_time, r.d_time, i.name from appointment_record r, inn i where r.status = '已預訂' and r.inn_style = i.id");
                    $sql2 = $pdo->query("select r.id, r.a_time, r.d_time, i.name from appointment_record r, inn i where r.status = '已預訂' and r.inn_style = i.id");
                }
                
                $isNull = $sql2->fetch();

                if($isNull == true){
                    foreach($sql as $sql){
                        $id = $sql['id'];
                        $a_time = $sql['a_time'];
                        $d_time = $sql['d_time'];
                        $inn_style = $sql['name'];
        ?>

                    <div class="col-lg-4">
                        <div class="card mb-4 py-3 border-left-info">
                            <div class="card-body">
                                <p>訂單號碼: <?php echo $id ?></p>
                                <p>房型: <?php echo $inn_style ?></p>
                                <p>訂房日期: <?php echo $a_time ?> -> 離開日期: <?php echo $d_time ?></p>
                                <?php
                                    if($status == '管理者'){
                                ?>

                                <a href="##" class="btn btn-success btn-circle mr-2" onclick="check(<?php echo $id ?>)">
                                    <i class="fas fa-check"></i>
                                </a>

                                <a href="##" class="btn btn-warning btn-circle mr-2" onclick="alt(<?php echo $id ?>)">
                                    <i class="fas fa-wrench"></i>
                                </a>
                                <?php        
                                    }
                                ?>
                                <a href="##" class="btn btn-danger btn-circle mr-2" onclick="del(<?php echo $id ?>)">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </div>
                        </div>
                    </div>
        
        <?php
                    }
                }else{
        ?>
                <h4 class="mb-5">尚無預約紀錄</h4>
        <?php
                }
                $sql = NULL;
                $sql2 = NULL;
            
            // $result = NULL; 
        ?>

    </div>
    <script>
        function del(id) {
            Swal.fire({
                showCancelButton: "true",
                title: '是否要取消訂房',
                icon: "warning",
                confirmButtonText: "確定",
                cancelButtonText: "取消"
            }).then((result) => {                   /*是否確定*/
                if (result.isConfirmed) {    
                    document.location.href="appointment_del.php?id="+id;   /*確認轉址 */
                }
            });
        }

        function alt(id) {
            Swal.fire({
                showCancelButton: "true",
                title: '是否要修改訂房',
                icon: "question",
                confirmButtonText: "確定",
                cancelButtonText: "取消"
            }).then((result) => {                   /*是否確定*/
                if (result.isConfirmed) {    
                    document.location.href="alter_appointment.php?id="+id;   /*確認轉址 */
                }
            });
        }

        function check(id) {
            Swal.fire({
                showCancelButton: "true",
                title: '客戶已付款，完成此訂單?',
                icon: "question",
                confirmButtonText: "確定",
                cancelButtonText: "取消"
            }).then((result) => {                   /*是否確定*/
                if (result.isConfirmed) {    
                    document.location.href="check_appointment.php?id="+id;   /*確認轉址 */
                }
            });
        }

    </script>
    <?php if($status == '使用者'){ ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">預約訂房</h1>
    </div>
    <style>
        select,
        input[type="text"],
        input[type="date"] {
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

        <div class="mt-4 ml-4">
            <a href="##" class="btn btn-primary btn-icon-split" onclick="info()">
                <span class="icon text-white-50">
                    <i class="fas fa-info-circle"></i>
                </span>
                <span class="text">訂房須知</span>
            </a>
        </div>

        <div class="card-body text-alter">
            <center>
                <form action="appointment_output.php" method="post">
                    <div class="col-lg-12 row mt-1">
                        <div class="col-lg-4 mb-3">
                            <p class="ml-2 mt-2">訂房日期:</p>
                            <input type="date" name="a_time" required>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <p class="ml-2 mt-2">離開日期:</p>
                            <input type="date" name="d_time" required>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <p class="ml-2 mt-2">訂房人數:</p>
                            <input type="text" name="people" required>
                        </div>
                    </div>
                    <??>
                    <div class="col-lg-12 row mt-1">
                        <div class="col-lg-4">
                            <p class="ml-2 mt-2">房型:</p>
                            <select name="inn_style" required>
                                    <option value="">選擇房間</option>
                                <optgroup label="單人">
                                <!-- disabled="disabled" -->
                                    <option value="1">豪華單人房</option>
                                    <option value="2">尊榮單人房</option>
                                </optgroup>
                                <optgroup label="雙人">
                                    <option value="3">豪華雙床房</option>
                                    <option value="4">尊榮雙人房</option>
                                </optgroup>
                                <optgroup label="其他">
                                    <option value="5">貴賓聖心套房</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <p class="ml-2 mt-2">主辦單位/系名:</p>
                            <input type="text" name="place">
                        </div>
                        <div class="col-lg-4">
                            <p class="ml-2 mt-2">備註:</p>
                            <input type="text" name="note" maxlegth="50">
                        </div>
                        <!-- <input type="hidden" name="account_id" value=""> -->
                    </div>

                    <div class="sub mt-5"><button type="submit">申請</button></div>
                </form>
            </center>
            <script>
                $('form').on('submit', function () {
                    //送出表單前會觸發這部分
                    $.ajax({
                        url: 'appointment_output.php',      //要傳送的頁面
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
                                        '<b>預約成功</b>',
                                    focusConfirm: false,
                                    confirmButtonText:
                                        '<b style="color:white;text-decoration:none;">確定</b>',
                                    confirmButtonAriaLabel: '確定',
                                    confirmButtonClass: 'insert_button'
                                }).then((result) => {
                                    if(result.isConfirmed){
                                        document.location.href = "index.php?method=appointment";
                                    }
                                })
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
        </div>
    </div>
    <?php } ?>
</div>
<script>
    function info() {
        Swal.fire({
            title: '訂房須知',
            html: '需於三日前訂房；入住當日無法退房；其他請參考首頁;',
            icon: "info",
            confirmButtonText: "確定"
        });
    }

    function appoint() {
        Swal.fire({
            title: '訂房須知',
            html: '需於三日前訂房；入住當日無法退房；其他請參考首頁',
            icon: "success",
            confirmButtonText: "確定"
        });
    }

   
</script>

<?php include "footer.php"; ?>