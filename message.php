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

        position: absolute;
        bottom: 1.5rem;
        left: 48%;
        transform: translate(-50%, -50%);
    }

    .outer a{
        outline: none;
        text-decoration: none;


    }
</style>
<div class="container-fluid mt-4">    
    <div class="card mt-4 mb-4 py-3 border-bottom-primary" style="height: 20rem;">
        <div class="card-body text-alter">
            <center>
            <?php
                $result = $_GET['message'];

                if($result == "true"){
                    echo "<h1>新增成功</h1>";
                }elseif($result == "false"){
                    echo "<h1>新增失敗</h1>";
                    echo "<p>請注意帳號是否有人使用；格式是否正確!</p>";
                }elseif($result == "inn_true"){
                    echo "<h1>刪除成功</h1>";
                }elseif ($result == "inn_false"){
                    echo "<h1>刪除失敗</h1>";
                    echo "<p>當天住宿預約無法刪除，或者洽詢服務人員。</p>";
                }elseif($result == "checkit"){
                    echo "<h1>此訂單完成</h1>";
                }
            ?>
            </center>

            <div class="outer">
            <center>
                <a href="index.php?method=home"><div class="change-pass">回首頁</div></a>
            </center>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>