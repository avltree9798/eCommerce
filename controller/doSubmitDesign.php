<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 11:39 AM
 */
    include '../controller/config.php';
    session_start();
    $ProductName = $_POST["ProductName"];
    $CategoryID = $_POST["CategoryID"];
    $ProductPrice = $_POST["ProductPrice"];
    $ProductTag = $_POST["ProductTag"];
    $idUser = $_SESSION["Id"];
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
            $query = "INSERT INTO design(ProductName,ProductImage,RequestPrice,UserID) VALUES('$ProductName','$file_name',$ProductPrice,$idUser)";
            mysql_query($query) or die();
            $id = mysql_insert_id();
            $tags = explode(";",$ProductTag);
            for($i=0;$i<count($tags);$i++){
                $q = "INSERT INTO productstags(ProductID, Tag) VALUES ($id, '$tags[$i]')";
                mysql_query($q) or die();
            }
            header("location:../userpanel");

        }else{
            print_r($errors);
        }
    }else{

    }