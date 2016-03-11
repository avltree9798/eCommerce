<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/9/16
 * Time: 4:42 PM
 */
include "config.php";
$cat = $_POST["cat"];
$id = $_POST["Id"];
$ProductName = $_POST["ProductName"];
$ProductPrice = $_POST["ProductPrice"];
$ProductDescription = $_POST["ProductDesctiption"];
$cariHarga = "SELECT * FROM productsprice WHERE ProductID = $id AND isCurrent = 1";
$resCariHarga = mysql_query($cariHarga);
$row = mysql_fetch_array($resCariHarga);
$updateDesc= "UPDATE products SET Description = '$ProductDescription' WHERE Id=$id";
mysql_query($updateDesc) or die (mysql_error());
if($row["Price"]!=$ProductPrice){
    $qUpdateHarga = "UPDATE productsprice SET isCurrent = 0 WHERE ProductID = $id AND isCurrent = 1";
    mysql_query($qUpdateHarga);
    $qUpdateHarga = "INSERT INTO productsprice VALUES(null,$id,$ProductPrice,1)";
    mysql_query($qUpdateHarga);
}
if($cat<5){
    $XS = $_POST["XS"];
    $S = $_POST["S"];
    $M = $_POST["M"];
    $L = $_POST["L"];
    $XL = $_POST["XL"];
    $updateStock = "UPDATE stock SET Stock = $XS WHERE UnitID = 1 AND ProductID = $id";
    mysql_query($updateStock)or die(mysql_error());

    $updateStock = "UPDATE stock SET Stock = $S WHERE UnitID = 2 AND ProductID = $id";
    mysql_query($updateStock)or die(mysql_error());
    $updateStock = "UPDATE stock SET Stock = $M WHERE UnitID = 3 AND ProductID = $id";
    mysql_query($updateStock)or die(mysql_error());
    $updateStock = "UPDATE stock SET Stock = $L WHERE UnitID = 4 AND ProductID = $id";
    mysql_query($updateStock)or die(mysql_error());
    $updateStock = "UPDATE stock SET Stock = $XL WHERE UnitID = 5 AND ProductID = $id";
    mysql_query($updateStock)or die(mysql_error());

}else{
    $pcs = $_POST["pcs"];
    $updateStock = "UPDATE stock SET Stock = $pcs WHERE UnitID = 6 AND ProductID = $id";
    mysql_query($updateStock)or die(mysql_error());
}
if(isset($_FILES['image'])){
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
    if(empty($errors)==true){
        move_uploaded_file($_FILES['image']['tmp_name'],"../assets/images/product/".$file_name);
        $insertQ = "INSERT INTO productimage VALUES(null,$id,'$file_name')";
        mysql_query($insertQ) or die(mysql_error());
    }
}
header("location:../adminpanel/editProduct.php?id=$id");
