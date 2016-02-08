<?php
  include 'config.php';
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $countryid = $_POST['countryid'];
  $address = $_POST['address'];
  $query_check_username = "SELECT * FROM user WHERE Username = '$username'";
  $query_check_email = "SELECT * FROM user WHERE Email = '$email'";
  $res_username = mysql_query($query_check_username);
  $res_email = mysql_query($query_check_email);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location:../register.php?mes=Invalid Email Address");
  }else if($row = mysql_fetch_array($res_username)){
    header("location:../register.php?mes=Username '$username' already taken");
  }else if($row = mysql_fetch_array($res_email)){
    header("location:../register.php?mes=Email '$email' already taken");
  }else{
    $query = "INSERT INTO user(Fullname,Username,Email,Password,CountryID,Address,Role) VALUES('$fullname','$username','$email','".md5($password)."',$countryid,'$address',2)";
    echo $query;
    $res = mysql_query($query) or die(mysql_error());
    header("location:../login.php");
  }
