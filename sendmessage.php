<?php
function e($x){
	return htmlspecialchars(stripslashes($x));
}

if(isset($_POST["submit"])){
	include 'includes/connect.php';

		//prepare and bind
        // (?,?,?,?) yan yung parameter markers gamit sa variable binding
		$sql = "INSERT INTO `tblmessages`(`name`, `email`, `message`, `datemess`) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
		$stmt->bind_param('ssss', $name, $email, $message, $timenow);
        // set parameters
        $name = e($_POST['namae']);
	    $email = e($_POST['email']);
 	    $message = e($_POST['message']);
        $timenow = time();
        //execute the prepared statement
		$stmt->execute(); 
        $stmt->close();
        $conn->close();
		$conn = null;
		header('Location: index.php');
}else{
    echo "May Mali";
	header('Location: index.php');
    
}

?>