<?php
/* session_start();
if(isset($_POST["REGISTER"]))
{
    $_SESSION["name"]=$_POST["name"];
    $_SESSION['last_login_timestamp']=time();
    header("location:combine.php");
}
*/
?>
<html>
    <head>
        <title>LogIn</title>
    </head>
    <pre>
    <body>

        <form action="combine.php" method="post">
            <table border="0" width="60%" cellpadding="4" cellspacing="0" align="center" bgcolor="lightyellow">
            <tr>
                <td> Name:</td>
                <td><input type="text" name="name"/></td>
            </tr>
        <tr>
                <td> Password:</td>
                <td><input type="password" name="password"/></td>
            </tr>
        <tr>
           <td align="center" colspan='2'>
           <input type="submit" name="REGISTER" value="LogIn" style='width: 80px; height: 30px; background-color:green; color:white; cursor:pointer;'>
                     </td>
                 </tr>
                 <tr>
                     <td align="right"><a href="index.php"><b>Sign Up</b></a></td>
                 </tr>
                 
    </table>
            </form>
    </body>
    </pre>




</html>