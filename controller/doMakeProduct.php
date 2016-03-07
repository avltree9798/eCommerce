<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 1:31 PM
 */
include 'config.php';
$id = $_POST['id'];
$price = $_POST['price'];
$cat = $_POST['CategoryID'];
$ProductName = $_POST["ProductName"];
$Description = $_POST["Description"];

$uploadDir = "../ProductImage/";
$uploadFile = $_FILES['image'];
$extractFile = pathinfo($uploadFile['name']);
$nama_gambar=$_FILES['image'] ['name']; 
$tmp_gambar=$_FILES['image'] ['tmp_name'];
$tipe_gambar=$_FILES['image'] ['type']; 
$size_gambar=$_FILES['image'] ['size']; 
$folder="../ProductImage/$nama_gambar"; 
if ($size_gambar<2200000&&($tipe_gambar=="image/jpeg" || ($tipe_gambar=="image/jpg" || $tipe_gambar=="image/png")))
{
	
	$sameName = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
	$handle = opendir($uploadDir);
	while(false !== ($file = readdir($handle))){ 
		if(strpos($file,$extractFile['filename']) !== false)
		$sameName++; // Tambah data file yang sama
	}
 
	/* Apabila tidak ada file yang sama ($sameName masih '0') maka nama file pakai 
	* nama ketika diupload, jika $sameName > 0 maka pakai format "namafile($sameName).ext */
	$nama_gambar = empty($sameName) ? $uploadFile['name'] : $extractFile['filename'].'('.$sameName.').'.$extractFile['extension'];
 $gambar=$nama_gambar;
	
	
$upload=move_uploaded_file($tmp_gambar,$uploadDir.$nama_gambar);
if($upload){
    echo "Gambar berhasil diupload <br>";
}
else {
    echo "gagal<br>";
}
}

else
{
die ("Gunakan file yang benar (JPEG, JPG, atau PNG) <br>");
}

$uploadDir1 = "../ProductImage/";
$uploadFile1 = $_FILES['image1'];
$extractFile1 = pathinfo($uploadFile1['name']);
$nama_gambar1=$_FILES['image1'] ['name']; 
$tmp_gambar1=$_FILES['image1'] ['tmp_name'];
$tipe_gambar1=$_FILES['image1'] ['type']; 
$size_gambar1=$_FILES['image1'] ['size']; 
$folder1="../ProductImage/$nama_gambar1"; 

if ($size_gambar1<2200000&&($tipe_gambar1=="image/jpeg" || ($tipe_gambar1=="image/jpg" || $tipe_gambar1=="image/png")))
{
	
	$sameName1 = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
	$handle1 = opendir($uploadDir1);
	while(false !== ($file1 = readdir($handle1))){ 
		if(strpos($file1,$extractFile1['filename']) !== false)
		$sameName1++; // Tambah data file yang sama
	}
 
	/* Apabila tidak ada file yang sama ($sameName masih '0') maka nama file pakai 
	* nama ketika diupload, jika $sameName > 0 maka pakai format "namafile($sameName).ext */
	$nama_gambar1 = empty($sameName1) ? $uploadFile1['name'] : $extractFile1['filename'].'('.$sameName1.').'.$extractFile1['extension'];
 $gambar1=$nama_gambar1;
	
	
$upload1=move_uploaded_file($tmp_gambar1,$uploadDir1.$nama_gambar1);
if($upload1){
    echo "Gambar 2 berhasil diupload <br>";
}
else {
    echo "gagal<br>";
}
}

else
{
die ("Gunakan tipe file 2 yang benar (JPEG, JPG, atau PNG) <br>");
}

$uploadDir2 = "../ProductImage/";
$uploadFile2 = $_FILES['image2'];
$extractFile2 = pathinfo($uploadFile2['name']);
$nama_gambar2=$_FILES['image2'] ['name']; 
$tmp_gambar2=$_FILES['image2'] ['tmp_name'];
$tipe_gambar2=$_FILES['image2'] ['type']; 
$size_gambar2=$_FILES['image2'] ['size']; 
$folder2="../ProductImage/$nama_gambar2"; 

if ($size_gambar2<2200000&&($tipe_gambar2=="image/jpeg" || ($tipe_gambar2=="image/jpg" || $tipe_gambar2=="image/png")))
{
	
	$sameName2 = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
	$handle2 = opendir($uploadDir2);
	while(false !== ($file2 = readdir($handle2))){ 
		if(strpos($file2,$extractFile2['filename']) !== false)
		$sameName2++; // Tambah data file yang sama
	}
 
	/* Apabila tidak ada file yang sama ($sameName masih '0') maka nama file pakai 
	* nama ketika diupload, jika $sameName > 0 maka pakai format "namafile($sameName).ext */
	$nama_gambar2 = empty($sameName2) ? $uploadFile2['name'] : $extractFile2['filename'].'('.$sameName2.').'.$extractFile2['extension'];
 $gambar2=$nama_gambar2;
	
	
$upload2=move_uploaded_file($tmp_gambar2,$uploadDir2.$nama_gambar2);
if($upload2){
    echo "Gambar 3 berhasil diupload <br>";
}
else {
    echo "gagal<br>";
}
}

else
{
die ("Gunakan tipe file 3 yang benar (JPEG, JPG, atau PNG) <br>");
}



$query = "INSERT INTO products(DesignID,CategoryID) VALUES ($id,$cat)";
mysql_query($query) or die(mysql_error());
$idProduct = mysql_insert_id();
$apa = array();
$queryStock = "SELECT * FROM units WHERE CategoryID = $cat";
$result = mysql_query($queryStock);
if($cat>4){
    while($row = mysql_fetch_array($result)){
        array_push($apa,$row["Id"]);
    }
    for($i=0;$i<count($apa);$i++){
        $queries = "INSERT INTO stock VALUES(NULL,$idProduct,$apa[$i],0)";
        mysql_query($queries) or die(mysql_error());
    }
}else{
    $queries = "INSERT INTO stock VALUES(NULL,$idProduct,6,0)";
    mysql_query($queries) or die(mysql_error());
}
$q = "INSERT INTO productsprice(ProductID, Price) VALUES($idProduct,$price)";
mysql_query($q) or die(mysql_error());



$des = "INSERT INTO productdesc(ProductID, ProductName,pimg1,pimg2,pimg3, Description) VALUES($idProduct,'$ProductName','$gambar','$gambar1','$gambar2','$Description')";
mysql_query($des) or die(mysql_error());

