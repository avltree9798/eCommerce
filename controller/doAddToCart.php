<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 5:08 PM
 */
session_start();
$unitID = $_GET['unitID'];
$productID = $_GET['productID'];
$qtys = $_GET['qty'];
if(isset($_SESSION['cartSystem']['item'][0])){
    $index = -1;
    for($i=0;$i<count($_SESSION['cartSystem']['item']);$i++){
        if($_SESSION['cartSystem']['item'][$i]==$productID){
            $index = $i;
            break;
        }
    }
    if($index!=-1){
        if($_SESSION['cartSystem']['unit'][$index]==$unitID){
            $_SESSION['cartSystem']['qty'][$index]+=$qtys;
        }else{
            echo "jaja";
            array_push($_SESSION['cartSystem']['item'],$productID);
            array_push($_SESSION['cartSystem']['unit'],$unitID);
            array_push($_SESSION['cartSystem']['qty'],$qtys);
        }
    }else{
        array_push($_SESSION['cartSystem']['item'],$productID);
        array_push($_SESSION['cartSystem']['unit'],$unitID);
        array_push($_SESSION['cartSystem']['qty'],$qtys);
    }
}else{
    $_SESSION['cartSystem']['item'] = array();
    $_SESSION['cartSystem']['unit'] = array();
    $_SESSION['cartSystem']['qty'] = array();
    array_push($_SESSION['cartSystem']['item'],$productID);
    array_push($_SESSION['cartSystem']['unit'],$unitID);
    array_push($_SESSION['cartSystem']['qty'],$qtys);
}
var_dump($_SESSION['cartSystem']);
header("location:../cart.php");