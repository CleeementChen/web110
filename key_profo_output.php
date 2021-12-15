<?php
$name=$_POST["name"];
$account_id=$_POST["account_id"];
$phone = $_POST["phone"];
$password=$_POST["password"];
$password2=$_POST["password2"];

$checked = ""; //提出帳號錯誤資訊

$pdo=new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');
$sql=$pdo->prepare('insert into account (name,account_id,phone,password,status) VALUES(?,?,?,?,?)');

$query = $pdo->query("select account_id from account where account_id = '".$account_id."'");
$result = $query->fetch();

$query2 = $pdo->query("select phone from account where phone = '".$phone."'");
$result2 = $query2->fetch();

if($result == true){
    $checked = "帳號已被使用";
}

if($result2 == true){
    $checked = "手機號碼已被使用";
}

if($result == false and $result2 == false and $password==$password2){
    $sql->execute([$name,$account_id,$phone,$password,'管理者']);
    echo '{"success":true}';
}else{
    echo '{"success": false,"checked":"'.$checked.'"}';
    // echo "<script>alert('有錯誤');window.history.back(-1);</script>";die;
}
?>