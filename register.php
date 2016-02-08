<?php
  include 'controller/config.php';
  $query = "SELECT * FROM country";
  $result = mysql_query($query);
?>
<form method='post' action='controller/doRegister.php'>
  <table>
    <tr>
      <td>Fullname</td>
      <td>:</td>
      <td><input type='text' name='fullname'/></td>
    </tr>

    <tr>
      <td>Username</td>
      <td>:</td>
      <td><input type='text' name='username'/></td>
    </tr>

    <tr>
      <td>Email</td>
      <td>:</td>
      <td><input type='email' name='email'/></td>
    </tr>

    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input type='password' name='password'/></td>
    </tr>

    <tr>
      <td>Country</td>
      <td>:</td>
      <td>
        <select name='countryid'>
          <?php
            while($row=mysql_fetch_array($result)){
              echo '<option value='.$row["CountryID"].'>'.$row["CountryName"].'</option>';
            }
          ?>
        </select>
      </td>
    </tr>

    <tr>
      <td>Address</td>
      <td>:</td>
      <td><textarea name='address'></textarea></td>
    </tr>
    <tr>
      <td colspan="3"><input type='submit' value='Register'/></td>
    </tr>
    <tr>
      <td colspan="3" style="color:red;"><?php if(isset($_GET['mes']))echo $_GET['mes'];?></td>
    </tr>
  </table>
</form>
