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
    <form method="post" action="../controller/doEditProduct.php">
        <input type="hidden" name="Id" value="<?php echo $id; ?>"/>
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
                <td><textarea name="ProductDesctiption"><?php echo $row["Description"]; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="hidden" name="cat" value="<?php echo $row["CategoryID"]; ?>"/>
                    <?php
                        $c = $row["CategoryID"];
                        if($c<5){
                            $q = "SELECT Stock FROM stock WHERE UnitID = 1 AND ProductID = $id";
                            $re = mysql_query($q);
                            $rw = mysql_fetch_array($re);
                            $XS = $rw["Stock"];
                            if($XS==null){
                                $q = "INSERT INTO stock VALUES(null,$id,1,0)";
                                mysql_query($q);
                                $XS=0;
                            }
                            $q = "SELECT Stock FROM stock WHERE UnitID = 2 AND ProductID = $id";
                            $re = mysql_query($q);
                            $rw = mysql_fetch_array($re);
                            $S = $rw["Stock"];
                            if($S==null){
                                $q = "INSERT INTO stock VALUES(null,$id,2,0)";
                                mysql_query($q);
                                $S=0;
                            }
                            $q = "SELECT Stock FROM stock WHERE UnitID = 3 AND ProductID = $id";
                            $re = mysql_query($q);
                            $rw = mysql_fetch_array($re);
                            $M = $rw["Stock"];
                            if($M==null){
                                $q = "INSERT INTO stock VALUES(null,$id,3,0)";
                                mysql_query($q);
                                $M=0;
                            }

                            $q = "SELECT Stock FROM stock WHERE UnitID = 4 AND ProductID = $id";
                            $re = mysql_query($q);
                            $rw = mysql_fetch_array($re);
                            $L = $rw["Stock"];
                            if($L==null){
                                $q = "INSERT INTO stock VALUES(null,$id,4,0)";
                                mysql_query($q);
                                $L=0;
                            }
                            $q = "SELECT Stock FROM stock WHERE UnitID = 5 AND ProductID = $id";
                            $re = mysql_query($q);
                            $rw = mysql_fetch_array($re);
                            $XL = $rw["Stock"];
                            if($XL==null){
                                $q = "INSERT INTO stock VALUES(null,$id,5,0)";
                                mysql_query($q);
                                $XL=0;
                            }
                            ?>
                            <table>
                                <tr>
                                    <td>Stock XS</td>
                                    <td>:</td>
                                    <td><input type="number" name="XS" value="<?php echo $XS; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Stock S</td>
                                    <td>:</td>
                                    <td><input type="number" name="S" value="<?php echo $S; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Stock M</td>
                                    <td>:</td>
                                    <td><input type="number" name="M" value="<?php echo $M; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Stock L</td>
                                    <td>:</td>
                                    <td><input type="number" name="L" value="<?php echo $L; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Stock XL</td>
                                    <td>:</td>
                                    <td><input type="number" name="XL" value="<?php echo $XL; ?>"/></td>
                                </tr>
                            </table>
                            <?php
                        }else{
                            $q = "SELECT Stock FROM stock WHERE UnitID = 6 AND ProductID = $id";
                            $re = mysql_query($q);
                            $rw = mysql_fetch_array($re);
                            $pcs = $rw["Stock"];
                            if($pcs==null){
                                $q = "INSERT INTO stock VALUES(null,$id,6,0)";
                                mysql_query($q);
                                $pcs=0;
                            }
                            ?>
                            <table>
                                <tr>
                                    <td>Stock</td>
                                    <td>:</td>
                                    <td><input type="text" name="pcs" value="<?php echo $pcs; ?>"/></td>
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
