<?php
    include '../controller/config.php';
    $query = "SELECT p.Id, p.ProductName, p.ProductImage, p.Description, pp.Price FROM products p JOIN productsprice pp ON p.Id = pp.ProductID WHERE pp.isCurrent = 1 AND p.isDeleted = 0";
    $result = mysql_query($query) or die(mysql_error());
?>
<html>
    <head>

    </head>
    <body>
        <table border="1">
            <tr>
                <td>Product Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Action</td>
            </tr>
            <?php
                while($row=mysql_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $row["ProductName"]; ?></td>
                        <td><?php echo $row["Description"]; ?></td>
                        <td><?php echo $row["Price"]; ?></td>
                        <td><table><tr><td><button onclick="window.location.href='editProduct.php?id=<?php echo $row["Id"]; ?>'">Edit</button><button onclick="window.location.href='../controller/doDeleteProduct.php?id=<?php echo $row["Id"]; ?>'">Remove</button></td></tr></table></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>