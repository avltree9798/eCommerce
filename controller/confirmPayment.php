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
header("location:../adminpanel/viewTransaction.php");