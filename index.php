<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 1:37 PM
 */
require 'lib/Functions.php';
include 'controller/config.php';
//$query = "SELECT d.ProductName, c.Name, u.Unit, s.Stock, pp.Price FROM design d JOIN products p ON d.Id = p.DesignID JOIN categories c ON p.CategoryID = c.Id, units u, stock s, productsprice pp
//WHERE c.Id = u.CategoryID AND s.ProductID = p.Id AND s.UnitID = u.Id AND pp.ProductID = p.Id AND pp.isCurrent = 1";
$query = "SELECT p.Id, d.ProductName, d.ProductImage, c.Name, pp.Price, p.CategoryID FROM design d JOIN products p ON d.Id = p.DesignID JOIN categories c ON p.CategoryID = c.Id, productsprice pp WHERE pp.ProductID = p.Id AND pp.isCurrent = 1";
$result = mysql_query($query);
$rate = new exchange_rates();
while($row=mysql_fetch_array($result)){
    $pID = $row["Id"];
    ?>
        <table>
            <tr>
                <td colspan="3">
                    <img src="assets/image.php?img=<?php echo $row['ProductImage']; ?>" width="200" height="200"/>
                </td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td>:</td>
                <td><?php echo $row["ProductName"]; ?></td>
            </tr>
            <tr>
                <td>Category</td>
                <td>:</td>
                <td><?php echo $row["Name"]; ?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td>:</td>
                <td><?php echo 'Rp. '.$row["Price"]." or $".$rate->exchange_rate_convert("IDR","USD",$row["Price"]); ?></td>
            </tr>
            <tr>
                <?php
                    $cat = $row['CategoryID'];
                    if($cat<5){
                        ?><td colspan="3">
                        <table>
                        <?php
                        $q = "SELECT * FROM units WHERE CategoryID=$cat";
                        $res = mysql_query($q);
                        while($r = mysql_fetch_array($res)){
                            $id = $r["Id"];
                            $qMax = "SELECT Stock FROM stock WHERE UnitID = $id AND ProductID = $pID";
                            $re = mysql_query($qMax);
                            $rw = mysql_fetch_array($re);
                            $max = $rw["Stock"];
                            ?>
                            <form method="get" action="controller/doAddToCart.php">
                            <tr><td>
                                    <input type="hidden" name="unitID" value="<?php echo $id; ?>"/>
                                    <input type="hidden" name="productID" value="<?php echo $pID; ?>"/>
                                    <?php echo $r["Unit"]; ?></td><td>:</td><td><?php echo ($max<=0)?"Out of stock":"<input type='number' name='qty' max='$max' min='1'/><input type='submit' value='Add to cart'/>"; ?></td></tr>
                            </form>
                            <?php
                        }
                        ?>
                        </table>
                    </td><?php
                    }else{
                        ?>
                        <form method="get" action="controller/doAddToCart.php">
                            <input type="hidden" name="unitID" value="6"/>
                            <input type="hidden" name="productID" value="<?php echo $pID; ?>"/>
                            <td colspan="2"><input type="number" name="qty"/></td>
                            <td><input type="submit" value="Add to cart"/></td>
                        </form>
                        <?php
                    }
                ?>
            </tr>
        </table>
    <?php
}