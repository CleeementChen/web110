<!DOCTYPE html>
<html lang="en">
<?php include "session_check.php"; ?>
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
        <div class="x-icon"><a href="index.php?method=profo"><center><i class="fas fa-times"></i></center></a></div>
        <h1><i class="fas fa-user-lock"></i> 修改密碼</h1>
        <form action="change_password_output.php" method="post">
                <input type="hidden" name="account_id" value = "<?php echo $_POST['account_id']?>">
            <div class="txt_field">
                <input type="password" name="password" maxlength="15" required>
                <span></span>
                <label>原密碼</label>
            </div>
            <div class="txt_field">
                <input type="password" name="new_pass" maxlength="15" required>
                <span></span>
                <label>輸入新密碼</label>
            </div>
            <div class="txt_field">
                <input type="password" name="new_pass2" maxlength="15" required>
                <span></span>
                <label>再次輸入新密碼</label>
            </div>
            <input type="submit" value="完成">
        </form>
    </div>
</body>
<script>
    $('form').on('submit', function () {
        //送出表單前會觸發這部分
        $.ajax({
            url: 'change_password_output.php',      //要傳送的頁面
            method: 'post',
            dataType: 'json',           //回傳資料是json格式
            data: $('form').serialize(), //將表單資料用打包起來送出去
            success: function (res) {
                //成功之後會執行這個方法
                if (res.success == true) {
                    Swal.fire({
                        allowOutsideClick: false,
                        icon: 'success',
                        html:
                            '<b>修改成功</b>',
                        focusConfirm: false,
                        confirmButtonText:
                            '<b style="color:white;text-decoration:none;">確定</b>',
                        confirmButtonAriaLabel: '確定',
                        confirmButtonClass: 'insert_button'
                    }).then((result) => {                   /*是否確定*/
                        if (result.isConfirmed) {
                            document.location.href = "index.php?method=profo";   /*確認轉址 */
                        }
                    });
                } else {

                    Swal.fire({
                        icon: 'error',
                        html:
                            '<b>' + res.checked + '</b>',
                        confirmButtonAriaLabel: '確定',
                        confirmButtonClass: 'insert_button',
                        confirmButtonText: '<b style="color:white;text-decoration:none;">確定</b>'
                    })
                }
            },
        });
        return false; //阻止瀏覽器轉跳到 send.php，因為已經用ajax送出去了
    })
</script>
</html>
