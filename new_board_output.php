<?php
    if(isset($_FILES['photo'])){
        $errors= array();
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));

        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152) {
            $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true) {
            move_uploaded_file($file_tmp,"ad_photo/".$file_name);
            // echo "Success";
        }else{
            print_r($errors);
        }
    }

    $title = $_POST['title'];
    $text = $_POST['text'];

    $pdo=new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8','root', '');
    $sql=$pdo->prepare('insert into advertisement (title, text, photo, time, status) VALUES(?,?,?,?,?)');


    $sql->execute([$title, $text, $file_name, date("Y-m-d"), 1]);

    header("location:index.php?method=board");
?>