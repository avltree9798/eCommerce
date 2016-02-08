<?php
  include 'config.php';
  $username = mysql_escape_string($_POST['username']);
  $password = mysql_escape_string($_POST['password']);
  $query = "SELECT * FROM user WHERE Username = '".$username."' AND Password = '".md5($password)."'";
  $result = mysql_query($query) or die (mysql_error());
  $row = mysql_fetch_array($result) or die (mysql_error());
  if(!empty($row['Username'])){
    session_start();
    $_SESSION["username"]=$username;
    $_SESSION["role"]=$row['Role'];
    echo "Login Success";
  }else{
    echo "Login Failed";
  }
