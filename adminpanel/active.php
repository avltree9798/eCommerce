<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 12:42 PM
 */
    include '../controller/config.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM design WHERE Id=".$id;
    $result = mysql_query($query);
    $row=mysql_fetch_array($result);
    $queryCategory = "SELECT * FROM categories";
    $cat = mysql_query($queryCategory);
    if($row[0]!=null){
        ?>
        <form action="../controller/doMakeProduct.php" method="post">
            <img src="../assets/image.php?img=<?php echo $row['ProductImage']; ?>" width="200" height="200"/><br/>
            <input type="hidden" name="id" value="<?php echo $row['Id']; ?>"/>
            Product Category : <select name="CategoryID" required>
                <?php
                while($rows=mysql_fetch_array($cat)){
                    echo '<option value='.$rows["Id"].'>'.$rows["Name"].'</option>';
                }
                ?>
            </select><br/>
            Price : <input type="number" value="<?php echo $row['RequestPrice']; ?>" name="price"/>
            <input type="submit" value="Save">
        </form>
        <?php
    }else{
        echo "gaada";
    }