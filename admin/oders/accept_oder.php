<?php 

$id = $_GET['id'];
require '../connect.php';
$sql = "update oders
set status = 1
where id='$id' ";
$result = $con->query($sql);
echo 1;
