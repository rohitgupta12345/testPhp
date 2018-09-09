<?php

require_once('connect.php');
echo "www";
print_r($_POST);
if (isset($_POST['email'])) {
    echo "yyy";
    $name = mysql_real_escape_string($_POST['name']);
    $email = mysql_real_escape_string($_POST['email']);
    $gender = mysql_real_escape_string($_POST['gender']);
    $password = mysql_real_escape_string($_POST['password']);
    $confirm_password = mysql_real_escape_string($_POST['confirm_password']);



    if (empty($name)) {
        echo $msg = "name is required";
        exit(0);
    } elseif ((!preg_match("/[a-zA-Z'-]/", $name))) {
        echo $msg = "Invalid name format";
        exit(0);
    } elseif (empty($email)) {
        echo $msg = "email is required";
        exit(0);
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo $msg = "Email is not a valid Email address";
        exit(0);
    } elseif (empty($password)) {
        echo $msg = "password is required";
        exit(0);
    } elseif (strlen($password) < 8) {
        echo $msg = "password is too short";
        exit(0);
    } elseif (!preg_match("#[0-9]+#", $password)) {
        echo $msg = "password must include atleast one number";
        exit(0);
    } elseif (!preg_match("#[a-zA-Z]+#", $password)) {
        echo $msg = "password must include atleast one letter";
        exit(0);
    } elseif ($password != $confirm_password) {
        echo $msg = "password must include atleast one letter";
        exit(0);
    } else {

        $query_table_info = "SELECT * FROM table_info WHERE email='" . $email . "'";
        $rs_table_info = mysql_query($query_table_info) or die('query failed: ' . mysql_error());
        $tr_table_info = mysql_num_rows($rs_table_info);

        if ($tr_table_info > 0) {
            echo $msg = "Email already exists";
            exit(0);
        }



        $insert_table_info = "INSERT INTO table_info(name,email,gender,password)VALUES('" . $name . "','" . $email . "','" . $gender . "','" . $password . "')";

        $res = mysql_query($insert_table_info);

        if ($res) {
            echo '1';
        }
    }
}
?>