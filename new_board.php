<!DOCTYPE html>
<html lang="en">
<?php
    include "session_check.php";
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
    <div class="center">
        <div class="x-icon"><a href="index.php?method=board"><center><i class="fas fa-times"></i></center></a></div>
        <h1><i class="fas fa-bullhorn"></i> 新增公告</h1>
        <form action="new_board_output.php" method="post" enctype = "multipart/form-data">
        <div class="txt_field">
                <input type="text" name="title" maxlength="8" required>
                <span></span>
                <label>輸入標題</label>
            </div>    
        <div class="txt_field">
                <input name="photo" type="file" accept=".jpg, .jpeg, .png" required>
            </div>
            
            <div class="txt_field">
                <textarea name="text"  cols="40" rows="15" maxlength="250" required></textarea>
            </div>
            
            <input type="submit" value="發出新公告">
        </form>
    </div>
</body>

</html>