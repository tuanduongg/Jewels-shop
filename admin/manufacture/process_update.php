<?php 
$name = $_POST['name_edit'];
$phone = $_POST['phone_edit'];
$id = $_POST['id'];
require '../connect.php';
$sql = "update manufacture set name = '$name'
,phone = '$phone'
where id='$id'";
$result = $con->query($sql);
if($result) {
    echo 1;
}else {
    echo 'lỗi truy vấn';
}
