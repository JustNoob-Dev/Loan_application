<?php
	
	include('../includes/connect.php');
	$id=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from tblloanapplication where MID='$id'");
	$arow=mysqli_fetch_array($a);
	$x = 'APPROVED';
    $y = 'REJECTED';
	if (($arow['status']==$x) || ($arow['status']==$y)){
		?>
		<script>
			window.alert('You cannot approved this Loan Application maybe its Already Approved or REJECTED!');
			window.history.back();
		</script>
	<?php
    }else{
	mysqli_query($conn, "UPDATE `tblloanapplication` SET `status`='$x' where MID='$id'");
         ?>
		<script>
			window.alert('Loan Application Successfully Approved!');
			window.history.back();
		</script>
	<?php
    }
?>