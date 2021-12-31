<?php include "session_check.php"; ?>
<?php
    session_start();
    $account_id = $_SESSION['account']['account_id'];

    $id = $_POST['id'];
    $a_time = $_POST['a_time'];
    $d_time = $_POST['d_time'];
    $people = $_POST['people'];
    $place = $_POST['place'];
    $note = $_POST['note'];
    $inn_style = $_POST['inn_style'];
    $org_inn = $_POST['org_inn'];
    
    $num_check = 0;  //期間房型數量
    $room_num_check = 0; //查詢飯店房間

    $pdo = new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8', 'root', '');

    $inn_count = $pdo->query("select count(inn_style) from appointment_record 
        where inn_style = '$inn_style' and a_time <= '$d_time' and d_time >= '$a_time' and status='已預訂'");
    foreach($inn_count as $row){
        $num_check = $row['count(inn_style)'];        #抓出房型目前預訂總數
    }
    $inn_count = NULL;

    $room_num = $pdo->query("select room_num from inn where id = '$inn_style'");
    foreach($room_num as $room_num){
        $room_num_check = $room_num['room_num'];      #抓出房型數
    }
    $room_num = NULL;

    if($inn_style == $org_inn){      
        $num_check -= 1;                #如果沒有更動房型，將房間數量判斷減少1(扣原本自己)
    }
    
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
        #修改預定基本資料

        if(!empty($place)){  #place(登記系所) 資料非空值時
            
            $check_place = $pdo->query("select place from appointment_place where id='$id'");
            $result_place = $check_place->fetch();

            if($result_place == false){
                $sql2 = $pdo->prepare("insert into appointment_place (id,account_id,place) VALUES (?,?,?)");
                $sql2->execute([$id, $account_id, $place]);
            }else{
                $sql2 = $pdo->prepare("update appointment_place set place=? where id='$id'");
                $sql2->execute([$place]);
            }
            $sql2 = NULL;
        }

        if(!empty($note)){   #note(備註) 非空

            $check_note = $pdo->query("select note from appointment_note where id='$id'");
            $result_note = $check_note->fetch();

            if($result_note == false){
                $sql3 = $pdo->prepare("insert into appointment_note (id ,account_id, note) VALUES(?,?,?)");
                $sql3->execute([$id, $account_id, $note]);
            }else{
                $sql3 = $pdo->prepare("update appointment_note set note=? where id='$id'");
                $sql3->execute([$note]);
            }

            $sql3 = NULL;
        }


        echo '{"success":true}';

    }
    
    
    


    // // header('location:index.php?method=message');
?>