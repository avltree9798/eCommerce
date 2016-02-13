<?php
  session_start();
  if(isset($_SESSION["username"]))
    echo "Hello ".$_SESSION["username"];
  else
    echo "<a href='login.php'>Login</a> first";
