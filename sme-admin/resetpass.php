<?php
require '../includes/connect.php';
/* function sa pag generate ng random password yan*/
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
/* ito nmn function sa pag alert using js haha para mlufet lng call mo nlng yan para sa alert box sht*/
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

$id=$_GET['id'];
if($_GET['id'] == true){
$password = random_password(8);   
$pass = md5($password);
$query = mysqli_query($conn,"UPDATE tblaccounts SET `password`='".$pass."' where `AID`=".$id); 
    
phpAlert("Password Succesfully Reset to \\n\\n ".$password." PLEASE! Remember the new password");

    /*
    wag kana gumamit neto nakakamatay ahahh
    echo "<script>
    $('#rpModal').modal('show');
    </script>";
    */
 
    }else{
    echo "error sa id sht";
}
mysqli_close($conn);
      ?>
      
      
     