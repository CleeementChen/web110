<?php include "nav1.php"; ?>
<?php include "band.php"; ?>
<style>
    img {
        margin: 20px;
        width: 300px;
        height: 200px;
        object-fit: cover;
        float: right;
        border-radius: .8rem;
    }
    .date-alter{
        position: absolute; bottom: 0; margin-top: 5px;
    }

    .new_info a{
        width: 100px;
        height: 40px;
        background: #4e73df;
        padding: 10px;
        border-radius: 50px;
        color: #fff;
        text-align: center;
        text-decoration: none;
        outline: none;
    }
</style>
<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">最新公告</h1>
    </div>
    <div class="new_info mt-5 mb-5">
        <a href="new_board.php">新增公告</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                    <img src="img/portfolio-1.jpg" alt="">
                    <h1>秋季折扣</h1>
                    <p class="mt-4">
                        秋季(9-10月)任意房型皆可獲得食科冰抵用券，請好好把握機會。
                    </p>
                    <p class="date-alter">發布時間: 2021/09/28</p>
                    <a href="##" class="btn btn-warning btn-circle mr-2" onclick="alt()">
                        <i class="fas fa-wrench"></i>
                    </a>
                    <a href="##" class="btn btn-danger btn-circle" onclick="del()">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                    <img src="img/portfolio-1.jpg" alt="">
                    <h1>入住領折價券</h1>
                    <p class="mt-4">
                        秋季(9-10月)任意房型皆可獲得食科冰抵用券，請好好把握機會。
                    </p>
                    <a href="##" class="btn btn-warning btn-circle mr-2" onclick="alt()">
                        <i class="fas fa-wrench"></i>
                    </a>
                    <a href="##" class="btn btn-danger btn-circle" onclick="del()">
                        <i class="fas fa-trash"></i>
                    </a>
                    <p class="date-alter">發布時間: 2021/10/10</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                    <img src="img/portfolio-1.jpg" alt="">
                    <h1>聖誕節派對</h1>
                    <p class="mt-4">
                        秋季(9-10月)任意房型皆可獲得食科冰抵用券，請好好把握機會。
                    </p>
                    <a href="##" class="btn btn-warning btn-circle mr-2" onclick="alt()">
                        <i class="fas fa-wrench"></i>
                    </a>
                    <a href="##" class="btn btn-danger btn-circle" onclick="del()">
                        <i class="fas fa-trash"></i>
                    </a>
                    <p class="date-alter">發布時間: 2021/11/01</p>
                </div>
            </div>
        </div>

    </div>

</div>
<script>
        function del() {
            Swal.fire({
                showCancelButton: "true",
                title: '是否要刪除公告',
                icon: "warning",
                confirmButtonText: "確定",
                cancelButtonText: "取消"
            });
        }

        function alt() {
            Swal.fire({
                showCancelButton: "true",
                title: '是否要修改公告',
                icon: "question",
                confirmButtonText: "確定",
                cancelButtonText: "取消"
            }).then((result) => {                   /*是否確定*/
                if (result.isConfirmed) {    
                    document.location.href="alter_board.php";   /*確認轉址 */
                }
            });
        }

    </script>

<?php include "nav2.php"; ?>