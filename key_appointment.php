<?php include "nav1.php" ?>
<?php include "band.php" ?>

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
                    <a href="##" class="btn btn-warning btn-circle mr-2" onclick="alt()">
                        <i class="fas fa-wrench"></i>
                    </a>
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
                    <a href="##" class="btn btn-warning btn-circle mr-2" onclick="alt()">
                        <i class="fas fa-wrench"></i>
                    </a>
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
                    document.location.href="key_appointment.php";   /*確認轉址 */
                }
            });
        }

        function alt() {
            Swal.fire({
                showCancelButton: "true",
                title: '是否要修改訂房',
                icon: "question",
                confirmButtonText: "確定",
                cancelButtonText: "取消"
            }).then((result) => {                   /*是否確定*/
                if (result.isConfirmed) {    
                    document.location.href="alter_appointment.php";   /*確認轉址 */
                }
            });
        }

    </script>


</div>


<?php include "nav2.php" ?>