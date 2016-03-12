<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/11/16
 * Time: 6:29 PM
 */
include 'config.php';
session_start();
$id = $_GET['id'];
$iduser =$_SESSION["Id"];
$query = "UPDATE transaction SET paymentstatus = 1, approvedBy = $iduser WHERE Id = $id";
mysql_query($query) or die(mysql_error());
$query = "SELECT d.ProductID, d.Qty, d.UnitID  FROM detail d WHERE d.TransactionID = $id";
$res = mysql_query($query) or die(mysql_error());
while($row=mysql_fetch_array($res)){
    $qty = $row["Qty"];
    $pId = $row["ProductID"];
    $uID = $row["UnitID"];
    $q = "UPDATE stock SET Stock = Stock - $qty WHERE ProductID = $pId AND UnitID = $uID ";
    mysql_query($q) or die(mysql_error());
}
header("location:../adminpanel/viewTransaction.php");