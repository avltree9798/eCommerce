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
$ProductName =$_POST['ProductName'];
$Description = $_POST['Description'];
if(isset($_FILES['image'])){
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
    if(empty($errors)==true){
        move_uploaded_file($_FILES['image']['tmp_name'],"../assets/images/".$file_name);
        $query = "INSERT INTO products(DesignID,CategoryID,ProductName,ProductImage,Description) VALUES ($id,$cat,'$ProductName','$file_name','$Description')";
        mysql_query($query) or die(mysql_error());
        $idProduct = mysql_insert_id();
        $apa = array();
        $queryStock = "SELECT * FROM units WHERE CategoryID = $cat";
        $result = mysql_query($queryStock);
        if($cat<5){
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
        //header("location:../adminpanel/index.php");
    }else{
        print_r($errors);
    }
}else{

}
