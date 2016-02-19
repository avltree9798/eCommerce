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
$cat = $_POST['CategoryID'];
$query = "INSERT INTO products(DesignID,CategoryID) VALUES ($id,$cat)";
mysql_query($query) or die(mysql_error());
$idProduct = mysql_insert_id();
$apa = array();
$queryStock = "SELECT * FROM units WHERE CategoryID = $cat";
$result = mysql_query($queryStock);
if($cat>4){
    while($row = mysql_fetch_array($result)){
        array_push($apa,$row["Id"]);
    }
    for($i=0;$i<count($apa);$i++){
        $queries = "INSERT INTO stock VALUES(NULL,$idProduct,$apa[$i],0)";
        mysql_query($queries) or die(mysql_error());
    }
}else{
    $queries = "INSERT INTO stock VALUES(NULL,$idProduct,6,0)";
    mysql_query($queries) or die(mysql_error());
}
$q = "INSERT INTO productsprice(ProductID, Price) VALUES($idProduct,$price)";
mysql_query($q) or die(mysql_error());
header("location:../adminpanel/index.php");