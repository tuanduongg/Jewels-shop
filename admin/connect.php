<?php 
$con = new mysqli('localhost','root','','webphukien');
$con -> set_charset("utf8");
if($con->connect_error) {
    die($con->connect_error);
}