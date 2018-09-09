<?php

include 'connect.php';
$searchtext = $_POST['searchtext'];

if (isset($searchtext) && trim($searchtext) != '') {
    $concatquery = "where Book_Name like '%$searchtext%' or Subject like '%$searchtext%' or Author like '%$searchtext%'";
} else {
    $concatquery = "";
}
$sql="SELECT Submission_Till FROM hrit_library where Submission_Till < '".date('Y-m-d')."'";
echo $sql;
$sql = "SELECT * FROM hrit_library $concatquery";
echo $sql;
$res = mysql_query($sql);
?>
<?php
require_once('connect.php');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if ($page == "" || $page == "1") {
    $page1 = 0;
} else {
    $page1 = ($page * 2) - 2;
}

$query_hrit_library = "SELECT * FROM hrit_library";
$res_hrit_library = mysql_query($query_hrit_library);
$tr_hrit_library = mysql_num_rows($res_hrit_library);

$total_link = $tr_hrit_library / 2;


$query_hrit_library2 = "SELECT * FROM hrit_library LIMIT $page1,2";
//echo $query_table_info2;
$rs_hrit_library2 = mysql_query($query_hrit_library2);
?>
<html>
    <head>
        <style>  ul li{
                display: inline;
            }</style>
    </head>
    <body>
        <div>
            <div>
        <?php include 'Homepage.php'; ?></div>
        <form action="library.php" method="post">
            <input type="text" name="searchtext" placeholder="search here"/>
            <input type="submit" name="searchval" value="searchval"/>
        </form>
       <table border='1' cellspacing='0' cellpadding='6' bgcolor='lightyellow' width='60%' align='center'>


            <tr>
                <th>Book_Id</th>
                <th>Book_Name</th>
                <th>Subject</th>
                <th>Author</th>
                <th>Student_Id</th>
                <th>Issue_Date</th>
                <th>Submission_Till</th>
                <th>Availability</th>

            </tr>
            <?php while ($row_hrit_library2 = mysql_fetch_assoc($rs_hrit_library2)) { ?>

                <tr>
                    <td><?php echo $row_hrit_library2['Book_Id']; ?></td>
                    <td><?php echo $row_hrit_library2['Book_Name']; ?></td>
                    <td><?php echo $row_hrit_library2['Subject']; ?></td>
                    <td><?php echo $row_hrit_library2['Author']; ?></td>
                    <td><?php echo $row_hrit_library2['Student_Id']; ?></td>
                    <td><?php echo $row_hrit_library2['Issue_Date']; ?></td>
                    <td><?php echo $row_hrit_library2['Submission_Till']; ?></td>
                    <td><?php echo $row_hrit_library2['Availability']; ?></td>
                    
                </tr>

            <?php } ?>
            <tr> 
                <td colspan='4' align='center'>
                    <ul>
                        <li><a href="<?php echo 'library.php?page=' . 1; ?>">First</li> 

                        <li><a href="library.php?page=<?php if ($page > 1) echo $page - 1; ?>" class='button'>Previous</a></li>; 

                        <?php
                        for ($i = 1; $i <= $total_link; $i++) {
                            ?>
                            <li><a href="<?php echo 'library.php?page=' . $i; ?>"><?php echo $i; ?></li>
                        <?php } ?>
                        <li><a href="library.php?page=<?php if ($page < $total_link) echo $page + 1; ?>" class='button'>Next</a></li>

                        <li> <a href="<?php echo 'library.php?page=' . $total_link; ?>">Last</li>

                    </ul>
            </tr>
  
        </table>
        </div>
    </body>
</html>