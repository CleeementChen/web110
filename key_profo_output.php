<!-- 不可刪 -->
<?php
$name=$_POST["name"];
$account_id=$_POST["account_id"];
$phone = $_POST["phone"];
$password=$_POST["password"];
$password2=$_POST["password2"];

$checked = ""; //提出帳號錯誤資訊
$error_check = true;

$pdo=new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');
$sql=$pdo->prepare('insert into account (name,account_id,phone,password,status) VALUES(?,?,?,?,?)');

$query = $pdo->query("select account_id from account where account_id = '".$account_id."'");
$result = $query->fetch();

$query2 = $pdo->query("select phone from account where phone = '".$phone."'");
$result2 = $query2->fetch();

if($result == true){
    $error_check = false;
    $checked = "帳號已被使用";
}

if($result2 == true){
    $error_check = false;
    $checked = "手機號碼已被使用";
}

if(!preg_match("/^(?=.*\d)(?=.*[a-zA-Z]).{6,16}$/", $account_id)){
    $error_check = false;
    $checked = "帳號格式不正確<br>(至少6碼以上並包含1個以上的英文字母與數字)";
}

if(!preg_match("/^(?=.*\d)(?=.*[a-zA-Z]).{6,16}$/", $password)){
    $error_check = false;
    $checked = "密碼格式不正確<br>(至少6碼以上並包含1個以上的英文字母與數字)";
}

// if(!preg_match("/^[a-zA-Z0-9]{6,16}$/", $account_id)){
//     $error_check = false;
//     $checked = "帳號格式不正確(至少6以上)";
// }


if(!preg_match("/^09[0-9]{8}$/", $phone)){
    $error_check = false;
    $checked = "手機格式不正確";
}

if($password != $password2){
    $error_check = false;
    $checked = "密碼不一致";
}

if($error_check != false){
    $sql->execute([$name,$account_id,$phone,$password,'管理者']);
    echo '{"success":true}';
}else{
    echo '{"success": false,"checked":"'.$checked.'"}';
    // echo "<script>alert('有錯誤');window.history.back(-1);</script>";die;
}

?>