<?php include "session_check.php"; ?>
<?php
    session_start();

    $account_id = $_SESSION['account']['account_id'];

    $a_time = $_POST['a_time'];
    $d_time = $_POST['d_time'];
    $people = $_POST['people'];
    $place = $_POST['place'];
    $note = $_POST['note'];
    $inn_style = $_POST['inn_style'];
    

    $num_check = 0;  //期間房型數量
    $room_num_check = 0; //查詢飯店房間

    $pdo = new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8', 'root', '');

    $inn_count = $pdo->query("select count(inn_style) from appointment_record 
        where inn_style = '$inn_style' and a_time <= '$d_time' and d_time >= '$a_time' and status='已預訂'");
    foreach($inn_count as $row){
        $num_check = $row['count(inn_style)'];
    }
    $inn_count = NULL;

    $room_num = $pdo->query("select room_num from inn where id = '$inn_style'");
    foreach($room_num as $room_num){
        $room_num_check = $room_num['room_num'];
    }
    $room_num = NULL;

    // echo $room_num_check;
    // echo $num_check;

    if($num_check >= $room_num_check){
        echo '{"success": false,"checked":"此期間房間已滿"}';
    }elseif($d_time <= $a_time){
        echo '{"success": false,"checked":"時間填寫有誤"}';
    }elseif($a_time <= date("Y-m-d")){
        echo '{"success": false,"checked":"請填寫有效時間"}';
    }else{
        $sql = $pdo->prepare("insert into appointment_record (account_id, a_time ,d_time ,inn_style ,people ,status) VALUES(?,?,?,?,?,?)");
        $sql->execute([$account_id, $a_time, $d_time, $inn_style, $people, '已預訂']);
        $sql = NULL;


        $s_id = $pdo->query("select id from appointment_record where account_id = '$account_id' and a_time = '$a_time' and d_time = '$d_time' and people='$people'  ");

        foreach($s_id as $s_id){
            $s_id = $s_id['id'];
        }

        if(!empty($place)){
            $sql2 = $pdo->prepare("insert into appointment_place (id ,account_id, place) VALUES(?,?,?)");
            $sql2->execute([$s_id, $account_id, $place]);
        }

        if(!empty($note)){
            $sql3 = $pdo->prepare("insert into appointment_note (id ,account_id, note) VALUES(?,?,?)");
            $sql3->execute([$s_id, $account_id, $note]);
        }

        $s_id = NULL;
        $sql2 = NULL;
        $sql3 = NULL;

        echo '{"success":true}';

    }
    
    
    


    // // header('location:index.php?method=message');
?>