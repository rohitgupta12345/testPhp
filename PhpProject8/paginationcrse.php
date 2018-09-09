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

$query_hrit_courses = "SELECT * FROM hrit_courses";
$res_hrit_courses = mysql_query($query_hrit_courses);
$tr_hrit_courses = mysql_num_rows($res_hrit_courses);

$total_link = $tr_hrit_courses / 2;


$query_hrit_library2 = "SELECT * FROM hrit_courses LIMIT $page1,2";
//echo $query_table_info2;
$rs_hrit_courses2 = mysql_query($query_hrit_courses2);
?>

<html>
    <head>
        <style>
              ul li{
                display: inline;
            }
        </style>
    </head>
    <body>
        <table align="center" border="1" bgcolor="light yellow" cellpadding="6" cellspacing="0">
            <tr>
                <th>Course Id</th>
                <th>Course Name</th>
                <th>Branch Name</th>
                <th>HOD</th>
                <th>Fee Structure</th>
            </tr>
     <?php            while ($row_hrit_courses2=mysql_fetch_assoc($res_hrit_courses)) { ?>
            
            <tr>
                <td><?php echo $row_hrit_courses2['COURSE_ID'] ?></td>
                <td><?php echo $row_hrit_courses2['COURSE_NAME'] ?></td>
                <td><?php echo $row_hrit_courses2['BRANCH_NAME'] ?></td>
                <td><?php echo $row_hrit_courses2['HOD'] ?></td>
                <td><?php echo $row_hrit_courses2['FEE_STRUCTURE'] ?></td>
            </tr>
     <?php } ?>
            
            <tr>
               
            <ul>
              <?php  for($i=0;$i<=$total_link;$i++) ?>
                {
            <li><a href="<?php echo 'paginationcrse.php?page=' .$i; ?>"><?php echo $i; ?></a></li>
            <li><a href="paginationcrse.php?page=<?php if($page>1) echo $page-1; ?>">Previous</a></li>
            <li><a href="paginationcrse.php?page=<?php if($page<$total_link) echo $page+1; ?>">Next</a></li>
                
                
                <?php}?>
            </ul>
            </tr>
            
            
            
                        
            
        </table>
       
    </body>
</html>