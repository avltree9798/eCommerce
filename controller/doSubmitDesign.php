<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/16/16
 * Time: 11:39 AM
 */
    include '../controller/config.php';
    session_start();
    $ProductName = $_POST["ProductName"];
    $ProductPrice = $_POST["ProductPrice"];
    $ProductTag = $_POST["ProductTag"];
    $idUser = $_SESSION["Id"];
	
    $uploadDir = "../DesignImage/";
$uploadFile = $_FILES['image'];
$extractFile = pathinfo($uploadFile['name']);
$nama_gambar=$_FILES['image'] ['name']; 
$tmp_gambar=$_FILES['image'] ['tmp_name'];
$tipe_gambar=$_FILES['image'] ['type']; 
$size_gambar=$_FILES['image'] ['size']; 
$folder="../DesignImage/$nama_gambar"; 
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
	$query = "INSERT INTO design(ProductName,ProductImage,RequestPrice,UserID) VALUES('$ProductName','$gambar',$ProductPrice,$idUser)";
     mysql_query($query) or die(mysql_error());
	 $id = mysql_insert_id();
            $tags = explode(";",$ProductTag);
            for($i=0;$i<count($tags);$i++){
                $q = "INSERT INTO productstags(ProductID, Tag) VALUES ($id, '$tags[$i]')";
                mysql_query($q) or die();}
    echo"upload&insert";
	header("location:../adminpanel");
}
else {
    echo "gagal<br>";
}
}

else
{
die ("Gunakan file yang benar (JPEG, JPG, atau PNG) <br>");
}
