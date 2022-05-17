<?php
session_start();
if ($_SESSION['quyen'] == '2') {
    header('location:../index.php');
}
include('../thuvien.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin</title>
</head>

<body>
    <div class="k">
        <div class="nav">
            <ul>
                <li><a href="?view=qldm">Quản lý danh mục</a></li>
                <li><a href="?view=qlmon">Quản lý món</a></li>
                <li><a href="?view=qldh">Quản lý đơn hàng</a></li>
                <li><a href="?view=qluser">Quản lý user</a></li>
                <li><a href="?view=qltd">Quản lý tuyển dụng</a></li>
            </ul>
        </div>
        <div class="main">
            <?php
            if(isset($_GET['view'])){
                $view=$_GET['view'];
                switch ($view) {
                    case 'qldm':
                        include('danhmuc/edit.php');
                    break;
                    case 'qlmon':
                        include('mon/edit.php');
                    break;
                    case 'qluser':
                        include('user/edit.php');
                    break;
                    case 'qltd':
                        include('tuyendung/edit.php');
                    break;
                    case 'qldh':
                        include('donhang/edit.php');
                    break;
                    default:
                        # code...
                        break;
                }
            }else{
                echo '<h2 style="color:green">Xin chào admin</h2>';
            }
           
            ?>
        </div>
    </div>

</body>

</html>