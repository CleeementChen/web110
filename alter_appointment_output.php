<?php include "session_check.php"; ?>
<?php
    session_start();

    $id = $_POST['id'];
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

        $sql = $pdo->prepare("update appointment_record set a_time=?, d_time=?, inn_style=?, people=? where id='$id'");
        $sql->execute([$a_time, $d_time, $inn_style, $people]);
        $sql = NULL;

        if(!empty($place)){
            
            $sql2 = $pdo->prepare("update appointment_place set place=? where id='$id'");
            $sql2->execute([$place]);
        }

        if(!empty($note)){
            $sql3 = $pdo->prepare("update appointment_note set note=? where id='$id'");
            $sql3->execute([$note]);
        }

        $sql2 = NULL;
        $sql3 = NULL;

        echo '{"success":true}';

    }
    
    
    


    // // header('location:index.php?method=message');
?>