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

$query_table_info = "SELECT name, email, gender FROM table_info";
$res_table_info = mysql_query($query_table_info);
$tr_table_info = mysql_num_rows($res_table_info);

$total_link = $tr_table_info / 2;


$query_table_info2 = "SELECT name, email, gender FROM table_info LIMIT $page1,2";
//echo $query_table_info2;
$res_table_info2 = mysql_query($query_table_info2);
?>
<html>


    <head>
        <title>Pagination In PHP </title>
        <style>
            ul li{
                display: inline;
            }
        </style>
    </head>
    <body>


        <table border='1' cellspacing='0' cellpadding='6' bgcolor='lightyellow' width='60%' align='center'>


            <tr>
                <th>User Name</th>
                <th>Email Address</th>
                <th>gender</th>

            </tr>
            <?php while ($row_table_info2 = mysql_fetch_assoc($res_table_info2)) { ?>

                <tr>
                    <td><?php echo $row_table_info2['name']; ?></td>
                    <td><?php echo $row_table_info2['email']; ?></td>
                    <td><?php echo $row_table_info2['gender']; ?></td>
                    <td></td>
                </tr>

            <?php } ?>
            <tr> 
                <td colspan='4' align='center'>
                    <ul>
                        <li><a href="<?php echo 'pagination.php?page=' . 1; ?>">First</li> 

                        <li><a href="pagination.php?page=<?php if ($page > 1) echo $page - 1; ?>" class='button'>Previous</a></li>; 

                        <?php
                        for ($i = 1; $i <= $total_link; $i++) {
                            ?>
                            <li><a href="<?php echo 'pagination.php?page=' . $i; ?>"><?php echo $i; ?></li>
                        <?php } ?>
                        <li><a href="pagination.php?page=<?php if ($page < $total_link) echo $page + 1; ?>" class='button'>Next</a></li>

                        <li> <a href="<?php echo 'pagination.php?page=' . $total_link; ?>">Last</li>

                    </ul>
            </tr>


        </table>

    </body>

</html> 