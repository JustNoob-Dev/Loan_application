<?php

function e($x){
	return htmlspecialchars(stripslashes($x));
}





if(isset($_POST["submit"])){
include '../includes/connect.php';

$sql = "INSERT INTO `tblinterest`(`loan_interest`,`datechange`) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $loan_interest , $date);
$loan_interest = e($_POST['interest']);
$date = date("Y-m-d");    
$stmt->execute(); 
$stmt->close();
$conn->close();
$conn = null;
header('Location: loan_interest.php');
}else{
    echo "May Mali";

    
}





//f(isset($_POST["changeint"])){
//include '../includes/connect.php';
//$interest=$conn->escape_string($_POST['interest']);
//if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);      }   
    
//$sql="INSERT INTO tblinterest(loan_interest) VALUES('$interest')"; 
//$result = $conn->query($sql);    
 // if($result){
	//echo  "napalitan mona";
  
 /// }  else 
     // echo "may mali";
//}
                ?>