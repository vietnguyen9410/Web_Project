<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
function ex($sql){
    mysqli_query($conn= mysqli_connect('localhost','root','','nhahang'),$sql);
}
function kq($sql){
    $data=[];
    $tt=mysqli_query($conn= mysqli_connect('localhost','root','','nhahang'),$sql);
    while($row=mysqli_fetch_array($tt,1)){
        $data[]=$row;
    }
    return $data;
}
?>