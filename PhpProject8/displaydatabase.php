<?php
require_once('connect.php');

if (isset($_GET['id'])) {
    $sql = "delete from table_info where id=" . $_GET['id'];
    $res = mysql_query($sql);
    ?><script>alert('record successfully deleted');</script><?php
}


$sql = "SELECT * FROM table_info";
$res = mysql_query($sql);
?>
<body>
<head>
    <title>Registration Form Data</title>
    <style>
        ul li{
            display: inline;
        }
    </style>
</head>
<table border="0" width="60%" cellpadding="8" cellspacing="0" align="center" bgcolor="lightyellow">

    <tr>
        <td colspan="6" bgcolor="orange" align='center'><font color='white' size='5'>Users List</font></td>    
    </tr>
    <tr><td colspan='2'></td></tr>


    <th>Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Gender</th>
    <th>Edit</th>
    <th>Delete</th>


    <?php
    $count = 1;
    $table_info = mysql_fetch_array($res);

    while ($table_info = mysql_fetch_array($res)) {
        echo"<tr>";
        echo "<td>" . $count . "</td>";
        echo"<td>" . $table_info['name'] ."</td>";
        echo"<td>" . $table_info['email'] ."</td>";
        echo"<td>" . $table_info['password'] ."</td>";
        echo"<td>" . $table_info['gender'] . "</td>";
        echo"<td><a href='index.php?id=$table_info[id]'>Edit</a></td>";
        
        echo"<td><a href='displaydatabase.php?id=$table_info[id]'>Delete</a></td>";


        $page1 = 0;
        $query_table_info = "SELECT name, email, gender, password FROM table_info";
        $res_table_info = mysql_query($query_table_info);
        $tr_table_info = mysql_num_rows($res_table_info);

        $total_link = $tr_table_info / 2;


        $query_table_info2 = "SELECT name, email, gender, password FROM table_info LIMIT $page1,2";
//echo $query_table_info2;
        $rs_table_info2 = mysql_query($query_table_info2);

        $count++;
    }
    ?>
    <tr> 
        <td colspan='4' align='center'>
            <ul>
                <li><a href="displaydatabase.php?page=<?php echo $page - 1; ?>" class='button'>Previous</a></li>; 

                <?php
                for ($i = 1; $i <= $total_link; $i++) {
                    ?>
                    <li><a href="<?php echo 'displaydatabase.php?page=' . $i; ?>"><?php echo $i; ?></li>
                <?php } ?>
                <li><a href="displaydatabase.php?page=<?php echo $page + 1; ?>" class='button'>Next</a></li>
            </ul>
    </tr>
    <tr>
        <td colspan="8" align="right">
            <a href="index.php"><b>Sign Up</b></a>
        </td>
    </tr>


</table>  

</body>

</html>
