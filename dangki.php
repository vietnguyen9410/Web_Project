<?php
$tb = '';
include('thuvien.php');
if (isset($_POST['dangki'])) {
    $email = $_POST['email'];
    $hovaten = $_POST['hovaten'];
    $passwrod = $_POST['password'];
    $quyen = 2;
    $sqlkt = "SELECT*FROM user";
    $kqkt = kq($sqlkt);
    foreach ($kqkt as $valuekq) {
        if ($email == $valuekq['email']) {
            $tb = '<span style="color:red">Email này đã được đăng kí trên hệ thống</span>';
        } else {
            $sqlthem = "INSERT INTO user(email,hovaten,password,quyen) VALUES('$email','$hovaten','$passwrod',$quyen)";
            ex($sqlthem);
            $tb = '<span style="color:green"> Đăng kí thành công</span>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="css/dkidn.css">
    <title>Đăng kí</title>
</head>

<body>
    <div class="form">

        <form action="" method="POST">
            <h2>Đăng kí tài khoản</h2>
            <?php
            echo $tb;
            ?><br>
            <label for="">email</label><br>
            <input required type="text" name="email"><br>
            <label for="">Họ và tên</label><br>
            <input required type="text" name="hovaten"><br>
            <label for="">Mật khẩu</label><br>
            <input required type="password" name="password"><br>
            <input class="btn btn-xanh" type="submit" value="Đăng kí" name="dangki">
            <a href="dangnhap.php">Đăng nhập</a>
        </form>
    </div>
</body>

</html>