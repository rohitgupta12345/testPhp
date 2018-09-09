<?php
echo "checkpoint 0"; 
require_once('connect.php');
echo "checkpoint 0.1"; 
if (isset($_POST['REGISTER'])) {
   echo "checkpoint 1"; 
    $name = $_POST['name'];
    $password = $_POST['password'];
    $name = stripslashes($name);
    $password = stripslashes($password);
    $name = mysql_real_escape_string($name);
    $password = mysql_real_escape_string($password);
    $sql = "SELECT * FROM table_info WHERE name='$name' AND password='$password'";
    echo $sql;
    $res = mysql_query($sql) or die("error: " . mysql_error());

    if(mysql_num_rows($res) > 0) {
   echo "checkpoint 2";
        session_start();
        $_SESSION["name"] = $name;
        $_SESSION["password"] = $password;

        $row = mysql_fetch_array($res);
    }

        if($row['is_admin'] == '1') {
            
               echo "checkpoint 3";
            header("location:admin.php");
        } elseif ($row['is_admin'] == '0') {
               echo "checkpoint 4";
            header("location:userdash.php");
        }
     else {
         
        echo "invalid password and username";
    }
}
?>