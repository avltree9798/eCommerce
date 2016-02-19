<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 12:34 PM
 */

session_start();
if(isset($_SESSION["username"])){ //Role 1 = Admin
    if($_SESSION["role"]==1) {
        ?>
        <a href="activatingProduct.php">Make Product from Design</a><br/>
        <a href="productList.php">Product List</a>
        <?php
    }
}else{
    header("location:../login.php");
}