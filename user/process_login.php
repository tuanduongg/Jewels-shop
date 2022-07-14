<?php 
require '../admin/connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])) {
    $remember  = true;
}else $remember =false;
$sql = "select * from customer where email = '$email' and password = '$password'";
$result = mysqli_query($con,$sql);
if($result->num_rows > 0) {
    $each = $result->fetch_array();
    session_start();
    $_SESSION['name'] = $each['name'];
    $_SESSION['id'] = $each['id'];
    // $token = $each['token'];
    // if($remember) {
    //     setcookie('token',$token,time() + 60 * 60 * 24 * 30);
    // }
    //
    echo 1;
}else {
    echo 'sai tài khoàn hoặc mật khẩu';
}