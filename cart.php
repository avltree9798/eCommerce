<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 5:39 PM
 */
include 'controller/config.php';
require 'lib/Functions.php';
$cur = new exchange_rates();
session_start();
if(isset($_SESSION['cartSystem']['item'][0])) {
    $item = $_SESSION['cartSystem']['item'];
    $unit = $_SESSION['cartSystem']['unit'];
    $qty = $_SESSION['cartSystem']['qty'];
    ?>
    <table>
        <tr>
            <td>Product Name</td>
            <td>Product Category</td>
            <td>Size</td>
            <td>Qty</td>
            <td>Price in IDR</td>
            <td>Price in USD</td>
            <td>Subtotal in IDR</td>
            <td>Subtotal in USD</td>
            <td>Action</td>
        </tr>
        <?php
            $total=0;
            for($i=0;$i<count($item);$i++){
                $productID = $_SESSION['cartSystem']['item'][$i];
                $unitID = $_SESSION['cartSystem']['unit'][$i];
                $queryForProduct = "SELECT p.ProductName, c.Name, u.Unit, 3, pp.Price FROM products p JOIN design d ON p.DesignID = d.Id JOIN categories c ON p.CategoryID = c.Id JOIN stock s ON s.ProductID = p.Id JOIN units u ON s.UnitID = u.Id JOIN productsprice pp ON p.Id = pp.ProductID WHERE p.Id = $productID AND u.Id = $unitID AND pp.isCurrent = 1";
                $res = mysql_query($queryForProduct) or die(mysql_error());
                $row = mysql_fetch_array($res);
                $dollar = $cur->exchange_rate_convert("IDR","USD",$row["Price"]);
                $total+=$row["Price"]*$_SESSION['cartSystem']['qty'][$i];
                ?>
                <tr>
                    <td><?php echo $row["ProductName"];?></td>
                    <td><?php echo $row["Name"];?></td>
                    <td><?php echo $row["Unit"];?></td>
                    <td><?php echo $_SESSION['cartSystem']['qty'][$i];?></td>
                    <td><?php echo $row["Price"];?></td>
                    <td><?php echo $dollar; ?></td>
                    <td><?php echo $row["Price"]*$_SESSION['cartSystem']['qty'][$i];?></td>
                    <td><?php echo $dollar*$_SESSION['cartSystem']['qty'][$i]; ?></td>
                </tr>
                <?php
            }
        ?>
        <tr>
            <td colspan="8" align="right">Total : <?php echo 'Rp.'.$total.' or $'.$cur->exchange_rate_convert("IDR","USD",$total); ?></td>
        </tr>
        <tr>
            <td colspan="8" align="center"><input type="button" value="Checkout Cart"/><input type="button" onclick="window.location.href='clearCart.php'" value="Clear Cart"/></td>
        </tr>
    </table>
    <?php
}else{
    echo "Nothing to show";
}

