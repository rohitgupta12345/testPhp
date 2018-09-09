<?php
require_once('connect.php');
if (isset($_POST['update'])) {
    $newname = $_POST['name'];
    $newemail = $_POST['email'];
    $newgender =$_POST['gender'];
    $newpassword = $_POST['password'];
   

    $id = $_GET['id'];
    $sql = "UPDATE table_info SET name='$newname',email='$newemail',gender='$newgender',password='$newpassword' WHERE id=" . $_GET['id'];
    $res = mysql_query($sql);
    if ($res) {
        echo 
        "<script>alert('data updated');location.replace('displaydatabase.php')</script>";
        
    } else {
        echo 'data not updated';
    }
}
if(isset($_POST['REGISTER']))
{
    $name=mysql_real_escape_string($_POST['name']);
    $email=mysql_real_escape_string($_POST['email']);
    $gender=mysql_real_escape_string($_POST['gender']);
    $password=mysql_real_escape_string($_POST['password']);
    $confirm_password=mysql_real_escape_string($_POST['confirm_password']);
    
    $filename = $_FILES["file"]['name'];
    $filetype = $_FILES["file"]['type'];
    $tmp_name = $_FILES["file"]['tmp_name'];
    $filesize = $_FILES["file"]['size']; 
    
    $allowed_ext=array("image/png","image/jpg","image/jpeg");
    
    if(empty($name)){
       
     ?><script>alert('name is required');location.replace('index.php');</script> <?php
     exit(0);
    }
    elseif((!preg_match("/[a-zA-Z'-]/",$name))){
        ?><script>alert('Invalid name format');location.replace('index.php');</script><?php
        exit(0);
    }
    elseif(empty($email)){
        ?><script>alert('email is required');location.replace('index.php');</script><?php
        exit(0);
    }
    
     elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         ?><script>alert('Email is not a valid Email address');location.replace('index.php');</script><?php
         exit(0);
       }        
     
    elseif(empty($password)){
        ?><script>alert('password is required');location.replace('index.php');</script><?php
        exit(0);
     }
     elseif(strlen($password)<8) {
        ?><script>alert('password is too short');location.replace('index.php');</script><?php
    }
    elseif(!preg_match("#[0-9]+#", $password)) {
    ?><script>alert('password must include atleast one number');location.replace('index.php');</script><?php
    }
    elseif(!preg_match("#[a-zA-Z]+#", $password)) {
    ?><script>alert('password must include atleast one letter');location.replace('index.php');</script><?php
    }
   elseif($password !=$confirm_password)
    {
        ?><script>alert('password do not match');location.replace('index.php');</script><?php
        exit(0);
    }

    
 //   $ext=end(explode('.',$_FILES["$filename"]["name"])); //get uploaded file ext
    elseif(!in_array($filetype,$allowed_ext))
    {
       ?><script>alert('invalid file type');location.replace('index.php');</script><?php
    }                                                                                                                                                   
    else if($filesize > 500000) 
    {
       ?><script>alert('large file size');location.replace('index.php');</script><?php
    }
   
    else
    {
        
        $query_table_info = "SELECT * FROM table_info WHERE email='".$email."'"; 
        $rs_table_info = mysql_query($query_table_info) or die('query failed: '.mysql_error());
        $tr_table_info = mysql_num_rows($rs_table_info);
      
        if($tr_table_info > 0)
        {
            ?><script>alert('Email already exists');location.replace('index.php');</script> <?php
        }
        
        
        move_uploaded_file($tmp_name, "images/".$filename); //$_FILES['file']['tmp_name'];

        //header("location:index.php");
       
        $insert_table_info = "INSERT INTO table_info(name,email,gender,password)VALUES('".$name."','".$email."','".$gender."','".$password."')";
        
        mysql_query($insert_table_info);
        
        ?><script>alert('Record inserted successfully');location.replace('index.php');</script><?php
    
    }
}
?>