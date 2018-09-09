<html>
    <head>
        <title>Student Record</title>
    </head>
    <body bgcolor="grey">
        <form action="stdntcntctn.php" method="POST" >
        <table align="center" border="1"  cellpadding="4" cellspacing="0" width="100%">
            <tr>
                        <td colspan="4" bgcolor="grey" align='center'><font color='white' size='5'>H.R Institute Of Technology(HRIT)</font></td>    
                    </tr>
            <tr>
                        <td colspan="4" bgcolor="orange" align='left'><font color='white' size='5'>Welcome Hritians</font></td>    
                    </tr>
                    <tr><td colspan='2'></td></tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name"</td>
                <td colspan="1" class="centernew"><input type="text" name="middlename"></td>
                 <td colspan="1" class="centernew"><input type="text" name="lastname"></td>
            </tr>
            <tr>
                <td>Father Name:</td>
                <td><input type="text" name="fname"</td>
                <td><input type="text" name="middlefname"</td>
                <td><input type="text" name="lastfname"</td>
            </tr>
               <tr>
                <td>Mother Name:</td>
                <td><input type="text" name="mname"</td>
                <td><input type="text" name="middlemname"</td>
                <td><input type="text" name="lastmname"</td>
            </tr>
               <tr>
                <td>Mobile No:</td>
                <td><input type="number" name="mobno"</td>
                <td colspan="1">Parent Mobile No:</td>
                <td><input type="number" name="parentmobno"</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email"</td>
                <td colspan="1">Parent Email:</td>
                <td><input type="text" name="parentemail"</td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="text" name="dob"</td>
                <td colspan="1">Gender:</td>
                <td>Female:<input type="radio" name="gender"value="female" checked>Male:<input type="radio" name="gender"value="male"</td>
            </tr>
            <tr>
            <td colspan="1">Blood Group:</td>
            <td><input type="text" name="bloodgroop"</td>
            </tr>
             <tr>
                        <td align="center" colspan='2'>
                            <input type="submit" name="<?php if (isset($_GET['id'])) { ?>update<?php } else { ?>REGISTER<?php } ?>" value="<?php if (isset($_GET['id'])) { ?>update<?php } else { ?>REGISTER<?php } ?>" style='width: 150px; height: 35px; background-color:green; color:white; cursor:pointer;'>
                        </td>

                    <tr>
        </table>
        </form>
    </body>
</html>