<?php
session_start();
include 'includes/connect.php';
  function e($x){
	return htmlspecialchars(stripslashes($x));
} 
        $personal = "Personal";
        $mid = $_SESSION['aid'];
	    $loan_amount = e($_POST['loan_amount']);
 	    $total_loan = e($_POST['tpay']);
        $interest = e($_POST['interest']);
        $loan_typ = e($_POST['loan_typ']);
        $num_p = e($_POST['typ_pay']);
        $payment = e($_POST['total_amount_perpay']);
        $date = date("Y-m-d");


  try{


    $sql = "INSERT INTO `tblloanapplication`(`MID`, `loan_amount`, `total_loan`, `interest`, `loan_type`, `loan_type_pay`, `num_pay`, `payment`, `loan_date`) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
		$stmt->bind_param('sssssssss', $mid, $loan_amount, $total_loan, $interest, $personal, $loan_typ, $num_p, $payment, $date);
        // set parameters
        
       
        //execute the prepared statement
		$stmt->execute(); 
        $stmt->close();
        $conn->close();
		$conn = null;
header('location: myloan.php');
}
catch(Exception $e) {
 echo $e->getMessage();
}

		//prepare and bind
        // (?,?,?,?) yan yung parameter markers gamit sa variable binding
    
		

 
    
    
    




?>


