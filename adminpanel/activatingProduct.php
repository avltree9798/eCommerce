<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 12:39 PM
 */
include '../controller/config.php';
session_start();
if(isset($_SESSION["username"])){ //Role 1 = Admin
    if($_SESSION["role"]==1) {
        $query = "SELECT * FROM design";
        $result = mysql_query($query);
        ?>
        <table>
            <tr>
                <td>Design Name</td>
                <td>Action</td>
            </tr>
            <?php
            while($row=mysql_fetch_array($result)){
                echo "<tr><td>".$row['ProductName']."</td><td><a href='active.php?id=$row[0]'>Make product</a></td></tr>";
            }
            ?>
        </table>
        <?php
    }
}else{
    header("location:../login.php");
}