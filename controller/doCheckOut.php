<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/9/16
 * Time: 7:28 PM
 */
include 'config.php';
session_start();
if(isset($_SESSION["Id"])){
    $id = $_SESSION['Id'];
    $queryForHeader = "INSERT INTO transaction VALUES(null,0,$id,now(),0)";
    mysql_query($queryForHeader) or die(mysql_error());
    $idHeader = mysql_insert_id();
    $item = $_SESSION['cartSystem']['item'];
    $unit = $_SESSION['cartSystem']['unit'];
    $qty = $_SESSION['cartSystem']['qty'];
    for($i=0;$i<count($item);$i++) {
        $productID = $_SESSION['cartSystem']['item'][$i];
        $unitID = $_SESSION['cartSystem']['unit'][$i];
        $queryForProduct = "SELECT pp.Id FROM products p JOIN categories c ON p.CategoryID = c.Id JOIN stock s ON s.ProductID = p.Id JOIN units u ON s.UnitID = u.Id JOIN productsprice pp ON p.Id = pp.ProductID WHERE p.Id = $productID AND u.Id = $unitID AND pp.isCurrent = 1";
        $res = mysql_query($queryForProduct) or die(mysql_error());
        $row = mysql_fetch_array($res);
        $priceID = $row["Id"];
        $qty = $_SESSION['cartSystem']['qty'][$i];
        $queryInsertDetail = "INSERT INTO detail VALUES(null,$productID,$priceID,$unitID,$qty)";
        mysql_query($queryInsertDetail) or die(mysql_error());
    }
}else{
    header("location:../login.php");
}