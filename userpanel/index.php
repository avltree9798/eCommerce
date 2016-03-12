<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 11:21 AM
 */
session_start();
if(isset($_SESSION["username"])){
    ?>
    <a href="addProduct.php">Add new Design</a><br/>
    <a href="listDesign.php">My Design</a>
    <?php
}else{
    header("location:../login.php");
}