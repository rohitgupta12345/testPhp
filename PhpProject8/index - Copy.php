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
        <script src="jquery.min.js">

        </script>
        <script>
            function sendAjax()
            { alert('send ajax calling');
                var stringData = $('form').serialize();
                //stringData.push({name: $('#register').attr('name'), value: $('#register').attr('name')});
                  
                   alert(stringData);
                    $.ajax({
                        url: "upload.php",
                        type: 'POST',
                        data: stringData,
                       
                        success: function (data)
                        {
                            alert(data);
                        }
                        

                    });
            }
            function checkforblank() 
            {
               // var oFile = document.getElementById("fileToUpload").files[0];
                if (document.getElementById('name').value == "")
                {
                    alert('please enter your name');
                    console.log("allnot okay");
                    return false;
                    
                } else if (document.getElementById('email').value == "") {
                    alert('please enter your email');
                    console.log("allnot okay");
                    return false;
                } else if (document.getElementById('password').value == "") {
                    alert('please enter your password');
                    console.log("allnot okay");
                    return false;
                } else if (document.getElementById('password').value.length < 5) {

                    alert('password length must be greater than five digit');
                    console.log("allnot okay");
                    return false;
                } else if (document.getElementById('password').value != document.getElementById('confirm_password').value) {
                    alert('password do not match');
                    return false;
                }
                sendAjax();
                
            }
            
        </script> 


    </head>
    <body font-color="red">

        <form  id="frmdata" method="post" action="upload.php" >
            <fieldset>

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
                        <td>Female:<input type="radio" name="gender" value="<?php if (isset($_GET['id'])) echo $row['Gender'] ?>" value="female" checked> &nbsp; Male:<input type="radio" name="gender" value="male"></td> 
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
                        <td align="center" colspan='2'>
                            <input type="button" id="register" name="register" value="register" style="width: 150px; height: 35px; background-color:green; color:white; cursor:pointer;" onclick="checkforblank();">
                        </td>
                    </tr>

                    <tr>
                        <td align="right"><a href="login.php">Log In</a></td>
                    </tr>



                </table>
            </fieldset>
        </form>
    </body>
</html> 