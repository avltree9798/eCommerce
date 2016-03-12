<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/12/16
 * Time: 8:29 PM
 */
include 'config.php';
$id = $_GET["id"];
$query = "UPDATE products SET isDeleted = 1 WHERE Id = $id";
mysql_query($query) or die(mysql_error());
header("location:../adminpanel/productList.php");