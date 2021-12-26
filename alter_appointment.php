<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    $account_id = $_SESSION['account']['account_id'];
    $id = $_GET['id'];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聖心教學旅館</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="img/school.png" rel="icon">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #704ab6;
            height: 100vh;
            overflow: hidden;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: white;
            border-radius: 10px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
        }

        .x-icon{
            position: absolute;
            right: -5px;
            top: -5px;
            width: 20px;
            height: 20px;
            border-radius: 50px;
            background: rgba(211, 62, 43);
            padding: 4px;
        }

        .x-icon a{
            outline: none;
            text-decoration:none;
            color: black;
        }

        .center h1 {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px solid silver;
        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
            margin: 40px 0;
        }

        form .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .txt_field input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }

        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
        }

        .txt_field span::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #174c70;
            transition: .5s;
        }

        .txt_field input:focus~label,
        .txt_field input:valid~label {
            top: -5px;
            color: #174c70;
        }

        .txt_field input:focus~span::before,
        .txt_field input:valid~span::before {
            width: 100%;
        }

        .pass {
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }

        .pass:hover {
            text-decoration: underline;
        }

        input[type="submit"] {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #231642;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }

        input[type="submit"]:hover {
            border-color: #190e33;
            transition: .5s;
        }

    </style>
    <?php
        $pdo = new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8', 'root', '');
        $sql = $pdo->query("select r.a_time, r.d_time, r.people, p.place, n.note from appointment_record r, appointment_place p, appointment_note n where r.id = '$id' and r.id = p.id and r.id = n.id");
        
        foreach($sql as $sql){
            $a_time = $sql['a_time'];
            $d_time = $sql['d_time'];
            $people = $sql['people'];
            $place = $sql['place'];
            $note = $sql['note'];
        }
    ?>
    <div class="center">
        <div class="x-icon"><a href="index.php?method=appointment"><center><i class="fas fa-times"></i></center></a></div>
        <h1><i class="fas fa-wrench"></i> 訂房更改</h1>
        <form action="key_appointment.php" method="post">
            <!-- <div class="txt_field"> -->
                <input type="hidden" name="id" required>
                <span></span>
                <label>訂單編號:<?php echo $id?></label>
            <!-- </div> -->
        <div class="txt_field">
                <input type="date" name="arr_date" value="<?php echo $a_time ?>" required>
                <span></span>
 
            </div>
            <div class="txt_field">
                <input type="date" name="depart_date" value="<?php echo $d_time ?>" required>
                <span></span>
            </div>    
            <div class="txt_field">
                <input type="text" name="people" maxlength="1" value = "<?php echo $people ?>" required>
                <span></span>
                <label>人數 </label>
            </div>        
        <div class="txt_field">
                <input type="text" name="room" required>
                <span></span>
                <label>豪華單人房</label>
            </div>
            
            <div class="txt_field">
            <input type="text" name="room" maxlength="50" required>
                <span></span>
                <label>備註:無</label>
            </div>
            <input type="submit" value="更改">
        </form>
    </div>
</body>

</html>