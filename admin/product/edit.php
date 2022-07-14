<?php 
$id = $_GET['id'];
require '../connect.php';
$sql = "select * from product where id='$id'";
$result = $con->query($sql);
$object = $result->fetch_array();
echo json_encode($object);
