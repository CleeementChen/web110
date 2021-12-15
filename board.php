<?php include "header.php"; ?>
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

    <?php
        if($_SESSION['account']['status'] == '管理者'){    
    ?>
    <div class="new_info mt-5 mb-5">
        <a href="new_board.php">新增公告</a>
    </div>
    <?php } ?>

    <div class="row">

        <?php
            $pdo=new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');
            
            $sql = $pdo->query("select * from advertisement where status = 1 order by time desc");

            foreach($sql as $sql){
                $id = $sql['id'];
                $title = $sql['title'];
                $text = $sql['text'];
                $time = $sql['time'];
                $photo = $sql['photo'];


        ?>

        <div class="col-lg-12">
            <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                    <img src="ad_photo/<?php echo $photo; ?>" alt="">
                    <h1><?php echo $title; ?></h1>
                    <p class="mt-4">
                        <?php echo $text;?>
                    </p>
                    <p class="date-alter">發布時間: <?php echo $time; ?></p>

                    <?php
                        if($_SESSION["account"]["status"] == '管理者'){
                    ?>
                        <a href="##" class="btn btn-warning btn-circle mr-2" onclick="alt(<?php echo $id; ?>)">
                            <i class="fas fa-wrench"></i>
                        </a>
                        <a href="##" class="btn btn-danger btn-circle" onclick="del(<?php echo $id; ?>)">
                            <i class="fas fa-trash"></i>
                        </a>
                    <?php        
                        }
                    ?>

                </div>
            </div>
        </div>

        <?php }?>

        <script>
        function del(num) {
            Swal.fire({
                showCancelButton: "true",
                title: '是否要刪除公告',
                icon: "warning",
                confirmButtonText: "確定",
                cancelButtonText: "取消"
            }).then((result) => {                   /*是否確定*/
                if (result.isConfirmed) {    
                    document.location.href='board_delete.php?id='+num;   /*確認轉址 */
                }
            });

        }

        function alt(num) {
            Swal.fire({
                showCancelButton: "true",
                title: '是否要修改公告',
                icon: "question",
                confirmButtonText: "確定",
                cancelButtonText: "取消"
            }).then((result) => {                   /*是否確定*/
                if (result.isConfirmed) {    
                    document.location.href="alter_board.php?id="+num;   /*確認轉址 */
                }
            });
        }
        </script>
    </div>

    

</div>

<?php include "footer.php"; ?>