<?php
    session_start();

    $account_id = $_POST['account_id'];

    $a_time = $_POST['a_time'];
    $d_time = $_POST['d_time'];
    $people = $_POST['people'];
    $place = $_POST['place'];
    $note = $_POST['note'];

    switch($_POST['inn_style']){
        case "1":
            $inn_style = "豪華單人房";
            break;
        case "2":
            $inn_style = "尊榮單人房";
            break;
        case "3":
            $inn_style = "豪華雙人房";
            break;
        case "4":
            $inn_style = "尊榮雙人房";
            break;
        case "5":
            $inn_style = "貴賓聖心房";
            break;
        default:
            $inn_style = "error";
    }

    if($inn_style == "error"){
        echo '{"success": false,"checked":"系統錯誤"}';
    }

    $pdo = new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8', 'root', '');
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

    echo '{"success":true}';

    

    

    // header('location:index.php?method=message');
    $s_id = NULL;
    $sql2 = NULL;
    $sql3 = NULL;
?>