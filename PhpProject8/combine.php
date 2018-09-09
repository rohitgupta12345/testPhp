
<?php
require_once('connect.php');

if (isset($_POST['submit'])) {
   
    $fname = $_POST['fname'];
    $password = $_POST['password'];
  
    $sql = "SELECT * FROM table_info WHERE first_name='$first_name' AND password='$password'";
    echo $sql;
   
    $res = mysql_query($sql) or die("error: " . mysql_error());
    
    if(mysql_num_rows($res) > 0) {
   $row= mysql_fetch_array($res);
    }
    
        if($row['is_user'] == '0') {
            
               
            header("location:dash.php");
        }
     else {
         
        echo "invalid password and username";
         header("location:login.php");
    }
}

?>


<?php/*

<?php
session_start();
require_once('connect.php');
echo $_SESSION['last_login_timestamp'];
    echo time();
echo time() - $_SESSION['last_login_timestamp'];
if (isset($_POST['REGISTER'])) {
   
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
  
     
        $row= mysql_fetch_array($res);
    }
        if($row['is_admin'] == '1') {
            
               
            header("location:admin.php");
        } elseif ($row['is_admin'] == '0') {
               echo "checkpoint 4";
            header("location:stdntrcrd.php");
        }
     else {
         
        echo "invalid password and username";
    }
}

?>