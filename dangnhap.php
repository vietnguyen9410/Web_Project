<?php
session_start();
include('thuvien.php');
$tb='';
if(isset($_POST['dangnhap'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sqlkt="SELECT*FROM user WHERE email='$email' AND password='$password'";
    $kq=mysqli_num_rows(mysqli_query($conn= mysqli_connect('localhost','root','','nhahang'),$sqlkt));
    if($kq>0){
        $_SESSION['user']=$email;
        $sqllay="SELECT*FROM user WHERE email='$email'";
        $kqlay=kq($sqllay);
        $_SESSION['quyen']=$kqlay[0]['quyen'];
        header('location:index.php');
    }else{
        $tb='<span style="color:red">Mật khẩu hoặc tài khoản không đúng</span>';
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
    <title>đăng nhập</title>
</head>
<body>
    <div class="form">
        <form action="" method="POST">
            <h2>Đăng nhập tài khoản</h2>
            <?php echo $tb ?><br>
            <label for="">email</label><br>
            <input required type="text" name="email"><br>
            <label for="">Mật khẩu</label><br>
            <input required type="password" name="password"><br>
            <input class="btn btn-xanh" type="submit" value="Đăng nhập" name="dangnhap">
            <a href="dangki.php">Đăng kí</a>
        </form>
    </div>
</body>
</html>