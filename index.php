<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:dangnhap.php');
}
include('thuvien.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css">
    <title>Nhà hàng hải sản</title>
</head>

<body>
    <div class="head">
        <div class="nav">
            <div class="nav-logo">
                <img src="img/logo/logo-slogan-1.png" alt="">
            </div>
            <div class="nav-i">
                <ul>
                    <li><a href="?view=trang-chu">Trang chủ</a></li>
                    <li><a href="?view=menu">Menu</a></li>
                    <li><a href="?view=gioi-thieu">Giới thiệu</a></li>
                    <li><a href="?view=tuyen-dung">Tuyển dụng</a></li>
                    <li><a href="?view=tai-khoan">Tài khoản</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        <?php 
        if(isset($_GET['view'])){
            $view=$_GET['view'];
            switch ($view) {
                case 'trang-chu':
                    include('trangchu.php');    
                break;
                case 'menu':
                    include('menu.php');    
                break;
                case 'gioi-thieu':
                    include('gioithieu.php');    
                break;
                case 'tuyen-dung':
                    include('tuyendung.php');    
                break;
                case 'tai-khoan':
                    include('taikhoan.php');    
                break;
                case 'chi-tiet-san-pham':
                    include('chitietsanpham.php');    
                break;
                default:
                    include('trangchu.php');
                    break;
            }
        }
        else{
            include('trangchu.php');
        }
        ?>
    </div>
    <footer>
        <div class="ft-i">
            <h3>Địa chỉ của chúng tôi</h3>
            <p><i class="bi bi-geo-alt-fill"></i> 20 ngõ 138 hẻm 4 Trần Đại Nghĩa</p>
            
        </div>
       
    </footer>
</body>

</html>