<?php
include '../includes/connect.php';
		session_start();
function e($x){
	return htmlspecialchars(stripslashes($x));
}


if(isset($_POST["submit"])){
$sql = "INSERT INTO `tblchat`(`AID`, `message`, `fname`, `chat_date`) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssss', $id, $msg, $sender, $date);
$msg = e($_POST['msg']);
$id = e($_SESSION['aid']);
$sender = e($_SESSION['username']);
$date = date("Y-m-d");    
$stmt->execute(); 
$stmt->close();
$conn->close();
$conn = null;
header("Location: chat.php?com=2");
}else{
    echo "May Mali";

}
?>
