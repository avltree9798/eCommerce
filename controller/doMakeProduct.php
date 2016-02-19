<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 1:31 PM
 */
include 'config.php';
$id = $_POST['id'];
$price = $_POST['price'];
$query = "UPDATE products SET Active = 1 WHERE Id = $id";
mysql_query($query) or die();
$q = "INSERT INTO productsprice(ProductID, Price) VALUES($id,$price)";
mysql_query($q) or die();
header("location:../adminpanel/index.php");