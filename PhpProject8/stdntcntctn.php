<?php
require_once 'connect.php';
if(isset($_POST['REGISTER']))
{
    $name=mysql_real_escape_string($_POST['name']);
    $middlename=mysql_real_escape_string($_POST['middlename']);
    $lastname=mysql_real_escape_string($_POST['lastname']);
    $fname=mysql_real_escape_string($_POST['fname']);
    $middlefname=mysql_real_escape_string($_POST['middlefname']);
    $lastfname=mysql_real_escape_string($_POST['lastfname']);
    $mname=mysql_real_escape_string($_POST['mname']);
    $middlemname=mysql_real_escape_string($_POST['middlemname']);
    $lastmname=mysql_real_escape_string($_POST['lastmname']);
    $mobno=mysql_real_escape_string($_POST['mobno']);
    $parentmobno=mysql_real_escape_string($_POST['parentmobno']);
    $email=mysql_real_escape_string($_POST['email']);
     $parentemail=mysql_real_escape_string($_POST['parentemail']);
      $dob=mysql_real_escape_string($_POST['dob']);
    $gender=mysql_real_escape_string($_POST['gender']);
   
    
  
        $insert_student = "INSERT INTO student(name,middlename,lastname,fname,middlefname,lastfname,mname,middlemname,lastmname,mobno,parentmobno,email,parentemail,dob,gender)VALUES('".$name."','".$middlename."','".$lastname."','".$fname."','".$middlefname."','".$mname."','".$name."','".$middlemname."','".$lastmname."','".$mobno."','".$parentmobno."','".$email."','".$parentemail."','".$dob."','".$gender."')";
        
        mysql_query($insert_student);
        
     
}