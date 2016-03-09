<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/8/16
 * Time: 4:56 PM
 */
    include "../controller/config.php";
    $id = $_GET["id"];
    $query = "SELECT p.ProductName, p.ProductImage, p.Description, pp.Price, p.CategoryID FROM products p JOIN productsprice pp ON p.Id = pp.ProductID WHERE pp.isCurrent = 1 AND p.Id = $id";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
?>
<html>
<body>
    <img src="../assets/image.php?img=<?php echo $row["ProductImage"];?>" width="300" height="300"/>
    <form>
        <table>
            <tr>
                <td>Product Name</td>
                <td>:</td>
                <td><input type="text" name="ProductName" value="<?php echo $row["ProductName"]; ?>"/></td>
            </tr>
            <tr>
                <td>Product Price</td>
                <td>:</td>
                <td><input type="number" name="ProductPrice" value="<?php echo $row["Price"]; ?>"/></td>
            </tr>
            <tr>
                <td>Product Description</td>
                <td>:</td>
                <td><textarea><?php echo $row["Description"]; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php
                        $c = $row["CategoryID"];
                        if($c<5){
                            $q = "SELECT Stock FROM stock WHERE UnitID = 1 AND ProductID = $id";
                            $re = mysql_query($qMax);
                            $rw = mysql_fetch_array($re);
                            ?>
                            <table>
                                <tr>
                                    <td>Stock XS</td>
                                    <td>:</td>
                                    <td><input type="number" name="XS"/></td>
                                </tr>
                                <tr>
                                    <td>Stock S</td>
                                    <td>:</td>
                                    <td><input type="number" name="S"/></td>
                                </tr>
                                <tr>
                                    <td>Stock M</td>
                                    <td>:</td>
                                    <td><input type="number" name="M"/></td>
                                </tr>
                                <tr>
                                    <td>Stock L</td>
                                    <td>:</td>
                                    <td><input type="number" name="L"/></td>
                                </tr>
                                <tr>
                                    <td>Stock XL</td>
                                    <td>:</td>
                                    <td><input type="number" name="XL"/></td>
                                </tr>
                            </table>
                            <?php
                        }else{
                            ?>
                            <table>
                                <tr>
                                    <td>Stock</td>
                                    <td>:</td>
                                    <td><input type="text" name="pcs"/></td>
                                </tr>
                            </table>
                            <?php
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="Save"/>
                    <input type="reset" name="Reset"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
