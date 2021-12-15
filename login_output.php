<?php
    session_start();
    $account_id = $_POST['account_id'];
    $password = $_POST['password'];
    unset($_SESSION['account']);

    $pdo=new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');

    $sql=$pdo->prepare('select * from account where account_id=? and password=?');    
    $sql->execute([$account_id, $password]);
    foreach ($sql->fetchAll() as $row) {
      $_SESSION['account']=[
          'account_id'=>$row['account_id'],
          'password'=>$row['password'],
          'name'=>$row['name'],
          'phone'=>$row['phone'],
          'status'=>$row['status']
      ];
    }

    if (isset($_SESSION['account'])){
        echo '{"success": true}';
        // header("location:home.php?manager_id=".$manager_id2."");
    }else{
        echo '{"success": false, "error":"帳號或密碼不正確"}';
     
     }
?>