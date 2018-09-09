include "connect.php";

// Check if $_SESSION or $_COOKIE already set
if( isset($_SESSION['email']) ){
 header('Location:login.php');
 exit;
}else if( isset($_COOKIE['rememberme'] )){
 
 // Decrypt cookie variable value
 $email = decryptCookie($_COOKIE['rememberme']);
 
 $sql_query = "select count(*) as cntemail,id from table_info where id='".$email."'";
 $result = mysqli_query($con,$sql_query);
 $row = mysqli_fetch_array($result);

 $count = $row['cntemail'];

 if( $count > 0 ){
  $_SESSION['email'] = $email; 
  header('Location: login.php');
  exit;
 }
}

// Encrypt cookie
function encrypt Cookie( $value ) {
 $key = 'your key';
 $new value = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $key ), $value, MCRYPT_MODE_CBC, md5( md5( $key ) ) ) );
 return( $new value );
}

// Decrypt cookie
function decrypt Cookie( $value ) {
 $key = 'your key';
 $new value = r trim( m crypt_decrypt( M CRYPT_RIJNDAEL_256, m d5( $key ), base64_decode( $value ), MCRYPT_MODE_CBC, m d5( m d5( $key ) ) ), "\0");
 return( $new value );
}

// On submit
if(isset($_POST['but_submit'])){

 $email = mysqli_real_escape_string($con,$_POST['txt_email']);
 $password = mysqli_real_escape_string($con,$_POST['txt_password']);
 
 if ($email != "" && $password != ""){

  $sql_query = "select count(*) as cntemail,id from users where email='".$email."' and password='".$password."'";
  $result = mysqli_query($con,$sql_query);
  $row = mysqli_fetch_array($result);

  $count = $row['cntemail'];

  if($count > 0){
   $email = $row['id'];
   if( isset($_POST['rememberme']) ){

    // Set cookie variables
    $days = 30;
    $value = encryptCookie($userid);
    setcookie ("rememberme",$value,time()+ ($days * 24 * 60 * 60 * 1000));
   }
 
   $_SESSION['email'] = $email; 
   header('Location:login.php');
   exit;
  }else{
   echo "Invalid email and password";
  }

 }

}