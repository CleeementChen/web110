<?php include "header.php"; ?>
<?php include "band.php"; ?>
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
    
    
    <div class="card mt-4 mb-4 py-3 border-bottom-primary" style="height: 20rem;">
        <p class="ml-3">新增管理帳號</p>
        <div class="card-body text-alter">
            <center><h1>
            <?php
                $result = $_GET['message'];

                if($result == "true"){
                    echo "新增成功";
                }else{
                    echo "新增失敗";
                }
            ?>
            </h1><p>請注意帳號是否有人使用；格式是否正確!</p></center>

            <div class="outer">
            <center>
                <a href="index.php?method=home"><div class="change-pass">回首頁</div></a>
            </center>
            </div>

        </div>
    </div>

</div>

    

<?php include "footer.php"; ?>