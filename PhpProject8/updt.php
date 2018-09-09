<?php
mysql_connect("localhost","root","");
mysql_select_db('element');
if(isset($_GET['id']))
{
 $sql="select * from table_info where id=".$_GET['id'];
$res=mysql_query($sql); 
$row=mysql_fetch_array($res);
}
if(isset($_POST['edit']))
{
    $newname = $_POST['name'];
    $newemail = $_POST['email'];
    $newpassword = $_POST['password'];
    $id=$_POST['id'];
    $sql="UPDATE table_info SET name='$newname' , email='$newemail' , password='$newpassword'  WHERE id=$id";
    $res=mysql_query($connect,$query);
    if($res)
    {
        echo'data updated';
    }
    else{
        echo 'data not updated';
    }
}
?>

<html>
    <head>
        <title>Registration Form</title>
        <script>
    </script>
    </head>
    <body font-color="red">
        <form action="upload.php" method="POST" onsubmit=return(checkforblank());>
            <fieldset>
      
            <table border="0" width="60%" cellpadding="8" cellspacing="0" align="center" bgcolor="lightyellow">
                <tr>
                    <td colspan="6" bgcolor="orange" align='center'><font color='white' size='8'>Registration form</font></td>    
                </tr>
                <tr><td colspan='2'></td></tr>
                <tr>
                    <td align="center">Name:</td>
                    <td><input type="text" id="name" name="newname" value="<?php if(isset($_GET['id']))echo $row['name']?>"></td>
                </tr>
                <tr>   
                        <td align="center">Email:</td>
                        <td><input type="text" id="email" name="email" value="<?php if (isset($_GET['id'])) echo $row['email'] ?>"></td>
                    </tr>

                    <tr>   
                        <td align="center">Gender:</td>
                        <td>Female:<input type="radio" name="gender" value="female" <?php if($row['gender'] == 'female'){echo 'checked';}?>> &nbsp; 
                            Male:<input type="radio" name="gender" value="male" <?php if($row['gender'] == 'male'){echo 'checked';}?>></td> 
                    </tr>
                 <tr>
                    <td align="center">Password:</td>
                    <td><input type="password" id="password" name="password" value="<?php if(isset($_GET['id']))echo $row['password']?>"></td>
                 </tr>
                 
                 <tr>
                      <td align="center">Confirm Password:</td>
                      <td><input type="password" id="confirmpassword" name="confirm_password" value="<?php if(isset($_GET['id']))echo $row['confirm_password']?>"></td>
                 </tr>
     
                 <tr>
                  
    
                
                 <tr>
                      <td align="center" colspan='2'>
                          <input type="submit" name="<?php if($_POST['id']){?>update<?php } else { ?> REGISTER <?php } ?>" value="<?php if($_POST['id']){?>update<?php } else { ?> Register <?php } ?>" style='width: 150px; height: 35px; background-color:green; color:white; cursor:pointer;'>
                     </td>
                 </tr>
            </table>
            </fieldset>
           
        </form>
    </body>
</html> 