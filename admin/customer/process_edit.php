<?php 
$name = $_POST['name_edit'];
$phone = $_POST['phone_edit'];
$email = $_POST['email_edit'];
$address = $_POST['address_edit'];
$id = $_POST['id'];
require '../connect.php';
$sql = "update customer set 
name = '$name',
phone = '$phone',
email = '$email',
address = '$address'
where id='$id'";
$result = $con->query($sql);
if($result) {
    echo 1;
}else {
    echo 'lỗi truy vấn';
}
