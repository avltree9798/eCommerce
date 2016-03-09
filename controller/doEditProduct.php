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
header("location:../adminpanel/editProduct.php?id=$id");
