<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/12/16
 * Time: 8:07 PM
 */
include '../controller/config.php';
$id = $_GET["id"];
$query = "SELECT * FROM design d WHERE Id = $id";
$res = mysql_query($query);
$row = mysql_fetch_array($res);
?>
<img src="../assets/image.php?img=<?php echo $row["ProductImage"]; ?>" width="300" height="300">
<form method="post" action="../controller/doUpdateDesign.php">
    <table>
        <tr>
            <input type="hidden" name="Id" value="<?php echo $row["Id"]; ?>"/>
            <td>Design Name</td>
            <td>:</td>
            <td><input type="text" name="ProductName" value="<?php echo $row["ProductName"]; ?>"/></td>
        </tr>
        <tr>
            <td>Design Price</td>
            <td>:</td>
            <td><input type="number" name="ProductPrice" value="<?php echo $row["RequestPrice"]; ?>"/></td>
        </tr>
        <tr>
            <td>Design Description</td>
            <td>:</td>
            <td><textarea name="Description"><?php echo $row["Description"]; ?></textarea></td>
        </tr>
        <tr>
            <td>Display Image</td>
            <td>:</td>
            <td><input type="file" name="displayImage"/></td>
        </tr>
        <tr>
            <td>Add new Image</td>
            <td>:</td>
            <td><input type="file" name="newImage"/></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" value="Submit"/>
            </td>
        </tr>
    </table>
</form>