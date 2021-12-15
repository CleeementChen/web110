<?php include "header.php"; ?>
<?php include "band.php"; ?>

<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">預約清單</h1>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 py-3 border-left-info">
                <div class="card-body">
                    <p>訂單號碼:00001</p>
                    <p>房型:****</p>
                    <p>訂房日期:****/**/** -> 離開日期:****/**/**</p>
                    <a href="##" class="btn btn-danger btn-circle" onclick="del()">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4 py-3 border-left-info">
                <div class="card-body">
                    <p>訂單號碼:00002</p>
                    <p>房型:****</p>
                    <p>訂房日期:****/**/** -> 離開日期:****/**/**</p>
                    <a class="btn btn-danger btn-circle" onclick="del()">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <script>
        function del() {
            Swal.fire({
                showCancelButton: "true",
                title: '是否要取消訂房',
                icon: "warning",
                confirmButtonText: "確定",
                cancelButtonText: "取消"
            }).then((result) => {                   /*是否確定*/
                if (result.isConfirmed) {    
                    document.location.href="home.php";   /*確認轉址 */
                }
            });
        }

    </script>

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
                <form method="post">
                    <div class="col-lg-12 row mt-1">
                        <div class="col-lg-4 mb-3">
                            <p class="ml-2 mt-2">訂房日期:</p>
                            <input type="date" name="arr_day">
                        </div>
                        <div class="col-lg-4 mb-3">
                            <p class="ml-2 mt-2">離開日期:</p>
                            <input type="date" name="depart_day">
                        </div>
                        <div class="col-lg-4 mb-3">
                            <p class="ml-2 mt-2">訂房人數:</p>
                            <input type="text" name="people">
                        </div>
                    </div>
                    <div class="col-lg-12 row mt-1">
                        <div class="col-lg-4">
                            <p class="ml-2 mt-2">房型:</p>
                            <select name="room_style" required>
                                <optgroup label="單人">
                                    <option value="01">豪華單人房</option>
                                    <option value="02">尊榮單人房</option>
                                </optgroup>
                                <optgroup label="雙人">
                                    <option value="03">豪華雙床房</option>
                                    <option value="04">尊榮雙人房</option>
                                </optgroup>
                                <optgroup label="其他">
                                    <option value="05">貴賓聖心套房</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <p class="ml-2 mt-2">主辦單位/系名:</p>
                            <input type="text" name="convi_con">
                        </div>
                        <div class="col-lg-4">
                            <p class="ml-2 mt-2">備註:</p>
                            <input type="text" name="memo" maxlegth="50">
                        </div>
                    </div>

                    <div class="sub mt-5"><button onclick="appoint()">申請</button></div>
                </form>
            </center>
        </div>
    </div>

</div>
<script>
    function info() {
        Swal.fire({
            title: '訂房須知',
            html: '需於三日前訂房；入住當日無法退房；其他請參考首頁',
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