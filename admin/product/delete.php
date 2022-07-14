<?php 
$id = $_GET['id'];
require '../connect.php';
$sql = "delete from product where id='$id'";
$result = $con->query($sql);
echo $sql;
