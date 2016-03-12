<table border="1">
    <tr>
        <td>Transaction ID</td>
        <td>Client Name</td>
        <td>Items</td>
        <td>Payment Status</td>
    </tr>
<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/9/16
 * Time: 8:19 PM
 */
include "../controller/config.php";
$query = 'SELECT t.Id, paymentstatus, u.Fullname FROM transaction t JOIN user u ON t.clientID = u.Id ';
$res = mysql_query($query) or die(mysql_error());
while($row=mysql_fetch_array($res)){
    $id = $row["Id"];
    $detailQuery = "SELECT ProductName, Unit, Price, Qty FROM detail d JOIN productsprice pp ON d.PriceID = pp.Id JOIN units u ON u.Id = d.UnitID JOIN products p ON d.ProductID =  p.Id WHERE TransactionID = $id AND pp.isCurrent = 1";
    $result = mysql_query($detailQuery) or die(mysql_error());
    //echo $detailQuery;
    ?>
    <tr>
    <td><?php echo $row["Id"]; ?></td>
    <td><?php echo $row["Fullname"]; ?></td>
    <td>
        <table border="1">
            <tr>
                <td>Item Name</td>
                <td>Units</td>
                <td>Price</td>
                <td>Quantity</td>
            </tr>
        <?php
            while($baris = mysql_fetch_array($result)){
               ?><tr>
                <td><?php echo $baris["ProductName"]; ?></td>
                <td><?php echo $baris["Unit"]; ?></td>
                <td><?php echo $baris["Price"]; ?></td>
                <td><?php echo $baris["Qty"]; ?></td>
            </tr><?php
            }
        ?>
        </table>
    </td>
    <td><?php echo $row["paymentstatus"]=='0'?"Not Done<br/><button onclick=\"window.location.href='../controller/confirmPayment.php?id=$id'\">Confirm Payment</button>":"Done"; ?></td>
    </tr>
        <?php
}

?>
</table>
