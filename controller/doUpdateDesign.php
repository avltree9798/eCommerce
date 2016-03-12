<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/12/16
 * Time: 8:18 PM
 */
include 'config.php';
$id = $_POST["Id"];
$productName = $_POST["ProductName"];
$productPrice = $_POST["ProductPrice"];
$productDescription = $_POST["Description"];
$query = "UPDATE design SET ProductName = '$productName', RequestPrice = $productPrice, Description = '$productDescription' WHERE Id=$id";
if(isset($_FILES["displayImage"])){
    $errors= array();
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_name = $ProductName.'.'.substr($_FILES['image']['name'],strrpos($_FILES['image']['name'],'.')+1);
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    if(empty($errors)==true) {
        move_uploaded_file($_FILES['image']['tmp_name'],"../assets/images/".$file_name);
        $query = "UPDATE design SET ProductName = '$productName', RequestPrice = $productPrice, Description = '$productDescription', ProductImage = $file_name  WHERE Id=$id";
    }
}
mysql_query($query) or die(mysql_error());
if(isset($_FILES["newImage"])){
    $errors= array();
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_name = $ProductName.rand().'.'.substr($_FILES['image']['name'],strrpos($_FILES['image']['name'],'.')+1);
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    if(empty($errors)==true) {
        move_uploaded_file($_FILES['image']['tmp_name'],"../assets/images/design/".$file_name);
        $query = "INSERT INTO designimage VALUES(null,$id,'$file_name')";
        mysql_query($query) or die(mysql_error());
    }
}
header("location:../userpanel/listDesign.php");