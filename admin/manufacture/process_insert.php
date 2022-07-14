<?php 
$name = $_POST['name'];
$phone = $_POST['phone'];
require '../connect.php';
$sql = "insert into manufacture(name,phone)values('$name','$phone')";
$result = $con->query($sql);
if(!$result) {
    echo 'lỗi truy vấn';
}else {
    echo 1;
}
