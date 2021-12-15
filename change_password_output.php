<?php

$account_id=$_POST["account_id"];
$password=$_POST["password"];
$new_pass=$_POST["new_pass"];
$new_pass2=$_POST["new_pass2"];

$checked = ""; //提出帳號錯誤資訊
$error_check = true;

$pdo=new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');

$query = $pdo->query("select password from account where account_id = '".$account_id."'");
foreach($query as $query){
    $query_search = $query["password"];
}
$sql = $pdo->prepare("update account set password = ? where account_id='$account_id' ");

if($query_search != $password){
    $checked = "原密碼輸入錯誤";
    $error_check = false;
}
if(!preg_match("/^(?=.*\d)(?=.*[a-zA-Z]).{6,16}$/", $new_pass)){
    $checked = "密碼格式不正確<br>(至少6碼以上並包含1個以上的英文字母與數字)";
    $error_check = false;
}
if($new_pass != $new_pass2){
    $checked = "新密碼輸入不一致";
    $error_check = false;
}
    
if($error_check != false){
    $sql->execute([$new_pass]);
    echo '{"success":true}';
}else{
    echo '{"success": false,"checked":"'.$checked.'"}';
    // echo "<script>alert('有錯誤');window.history.back(-1);</script>";die;
}


?>