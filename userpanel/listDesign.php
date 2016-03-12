<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/12/16
 * Time: 7:58 PM
 */
session_start();
include '../controller/config.php';
$id = $_SESSION["Id"];
$query = "SELECT * FROM design d  WHERE d.UserID=$id";
$res = mysql_query($query) or die(mysql_error());
?>
<table border="1">
    <tr>
        <td>Design Name</td>
        <td>Requested Price</td>
        <td>Description</td>
        <td>Action</td>
    </tr>
    <?php
        while($row=mysql_fetch_array($res)){
            ?>
            <tr>
                <td><?php echo $row["ProductName"]; ?></td>
                <td><?php echo $row["RequestPrice"]; ?></td>
                <td><?php echo $row["Description"]; ?></td>
                <td><button onclick="window.location.href='editDesign.php?id=<?php echo $row["Id"]; ?>'">Edit</button></td>
            </tr>
            <?php
        }
    ?>
</table>
