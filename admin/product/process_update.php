<?php
$file_name = $_POST['photo_old'];
if ($_POST["label"]) {
    $label = $_POST["label"];
}
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 200000)
    && in_array($extension, $allowedExts)
) {
    if ($_FILES["file"]["error"] > 0) {
        // echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        $folder = 'photos/';
        $file_path = time() . $_FILES["file"]["name"];
        $file_name = $folder . $file_path;
        // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        // echo "Type: " . $_FILES["file"]["type"] . "<br>";
        // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
        move_uploaded_file(
            $_FILES["file"]["tmp_name"],
            "photos/" . $file_path
        );
    }
} else {
    $file_name = $_POST['photo_old'];
}
$name = $_POST['name_edit'];
$price = $_POST['price_edit'];
$description = $_POST['description_edit'];
$id_manufacture = $_POST['id_manufacture_edit'];
$id = $_POST['id'];
require '../connect.php';

$sql = "update product set 
name = '$name',
price = '$price',
description = '$description',
id_manufacture = '$id_manufacture',
photo = '$file_name'
where id='$id'";
// echo $sql;
$result = $con->query($sql);
if($result) {
    echo 1;
}else {
    echo 'lỗi truy vấn';
}
