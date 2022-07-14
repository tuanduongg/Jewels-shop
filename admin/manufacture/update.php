<?php 
$id = $_GET['id'];
require '../connect.php';
$sql = "select * from manufacture where id='$id'";
$result = $con->query($sql);
$object = $result->fetch_array();
echo json_encode($object);
