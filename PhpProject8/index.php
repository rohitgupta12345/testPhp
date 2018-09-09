<?php
mysql_connect("localhost", "root", "");
mysql_select_db('element');
if (isset($_GET['id'])) {
    $sql = "select * from table_info where id=" . $_GET['id'];
    $res = mysql_query($sql);
    $row = mysql_fetch_array($res);
}

?>
<html>
    <head>
        <title>Registration Form</title>
        <script>
            function checkforblank() {
                var oFile = document.getElementById("fileToUpload").files[0];
                if (document.getElementById('name').value == "")
                {
                    alert('please enter your name');
                   console.log("allnot okay1");
                    return false;
                } else if (document.getElementById('email').value == "") {
                    alert('please enter your email');
                    console.log("allnot okay3");

                    return false;
                } else if (document.getElementById('password').value == "") {
                    alert('please enter your password');
                    console.log("allnot okay4");

                    return false;
                } else if (document.getElementById('password').value.length < 8) {

                    alert('password lenth must be greater than eight digit');
                    console.log("allnot okay5");
                    return false;
                } else if (document.getElementById('password').value != document.getElementById('confirm_password').value) {
                    alert('password do not match');
                    console.log("allnot okay6");
                    return false;
                }  else if (oFile) {

                    if (oFile.size > 2097152) // 2 mb for bytes.
                    {
                        alert("File size must under 2mb!");
                        console.log("allnot okay");
                        return false;
                    }
                }
                 else
                {

                    return true;
                }
            }
        </script> 


    </head>
    <body font-color="red">
        

        <form action="upload.php" method="POST" enctype="multipart/form-data" onsubmit=return(checkforblank());>
            

                <table border="0" width="60%" cellpadding="8" cellspacing="0" align="center" bgcolor="lightyellow">

                    <tr>
                        <td colspan="2" bgcolor="orange" align='center'><font color='white' size='5'>Registration form</font></td>    
                    </tr>
                    <tr><td colspan='2'></td></tr>

                    <tr>
                        <td align="center">Name:</td>
                        <td><input type="text" id="name" name="name" value="<?php if (isset($_GET['id'])) echo $row['name'] ?>"></td>
                    </tr>
                    <tr>   
                        <td align="center">Email:</td>
                        <td><input type="text" id="email" name="email" value="<?php if (isset($_GET['id'])) echo $row['email'] ?>"></td>
                    </tr>

                    <tr>   
                        <td align="center">Gender:</td>
                        <td>Female:<input type="radio" name="gender" value="<?php if (isset($_GET['id'])) echo $row['gender'] ?>" value="female" checked> &nbsp; Male:<input type="radio" name="gender" value="male"></td> 
                    </tr>
                    <tr>
                        <td align="center">Password:</td>
                        <td><input type="password" id="password" name="password" value="<?php if (isset($_GET['id'])) echo $row['password'] ?>"></td>
                    </tr>

                    <tr>
                        <td align="center">Confirm Password:</td>
                        <td><input type="password" id="confirm_password" name="confirm_password" value="<?php if (isset($_GET['id'])) echo $row['confirm_password'] ?>"></td>
                    </tr>

                    <tr>
                        <td align="center"> Select image to upload:</td>
                        <td><input type="file" name="file" id="fileToUpload" accept=".jpg,.png,.jpeg"/></td>
                    </tr>


                    <tr>
                        <td align="center" colspan='2'>
                            <input type="submit" name="<?php if (isset($_GET['id'])) { ?>update<?php } else { ?>REGISTER<?php } ?>" value="<?php if (isset($_GET['id'])) { ?>update<?php } else { ?>REGISTER<?php } ?>" style='width: 150px; height: 35px; background-color:green; color:white; cursor:pointer;'>
                        </td>

                    <tr>
                        <td align="right"><a href="login.php">Log In</a></td>
                    </tr>



                </table>
           
        </form>
    </body>
</html> 