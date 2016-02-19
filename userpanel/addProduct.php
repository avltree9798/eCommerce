<form action="../controller/doSubmitDesign.php" method="post" enctype="multipart/form-data">
    Design Name : <input type="text" name="ProductName" required/><br/>
    Design Image : <input type="file" name="image" required/><br/>
    Design Price : <input type="number" name="ProductPrice" required/><br/>
    Design Tags (Separated by semicolon ';') : <input type="text" name="ProductTag" required/><br/>
    <input type="submit" value="Submit Product"/>
</form>