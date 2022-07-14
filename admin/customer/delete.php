<?php 
$id = $_GET['id'];
require '../connect.php';
$sql = "delete from customer where id='$id'";
$result = $con->query($sql);
echo 1;
