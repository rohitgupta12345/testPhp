<?php

include 'connect.php';

$searchtext = $_POST['searchtext'];

if (isset($searchtext) && trim($searchtext) != '') {
    $concatquery = "where COURSE_NAME like '%$searchtext%' or FEE_STRUCTURE like '%$searchtext%' or COURSE_ID like '%$searchtext%' or BRANCH_NAME like '%$searchtext%' or HOD like '%$searchtext%'";
} else {
    $concatquery = "";
}

$sql = "SELECT * FROM hrit_courses $concatquery";

$res = mysql_query($sql);
?>

<html>
     <head>
        <title> User Page </title>
        <link rel="stylesheet" href="style2.css" type="text/css">
    </head>
    <body>
        <?php include 'Homepage.php'; ?>
        <form action="courses.php" method="post">
            <input type="text" name="searchtext" placeholder="search here"/>
            <input type="submit" name="searchval" value="searchval"/>
        </form>
            <h1><b>Welcome To Course Inquiry Section</b></h1>
            <table>
                <th>Course Id</th>
                <th>Course Name</th>
                <th>Branch Name</th>
                <td>HOD</td>
                <th>Fee Structure</th>

<?php
$hrit_courses = mysql_fetch_array($res);

while ($hrit_courses = mysql_fetch_array($res)) {
    echo"<tr>";

    echo"<td>" . $hrit_courses['COURSE_ID'] . "</td>";
    echo"<td>" . $hrit_courses['COURSE_NAME'] . "</td>";
    echo"<td>" . $hrit_courses['BRANCH_NAME'] . "</td>";
    echo"<td>" . $hrit_courses['HOD'] . "</td>";
    echo"<td>" . $hrit_courses['FEE_STRUCTURE'] . "</td>";
}
?>   
            </table>
        
    </body>
</html>