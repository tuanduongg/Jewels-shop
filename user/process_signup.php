<?php
require '../admin/connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$name = $_POST['name'];
$sql = "insert into customer(email,password,phone,address,name)values('$email','$password','$phone','$address','$name')";
$result = mysqli_query($con, $sql);
if ($result) {
    $sql = "select id,name from customer where email='$email' and password='$password'";
    $result = mysqli_query($con, $sql);
    $each = $result->fetch_array();
    session_start();
    $_SESSION['name'] = $each['name'];
    $_SESSION['id']  =  $each['id'];
    echo 1;
} else {
    echo 'lỗi truy vấn';
}
