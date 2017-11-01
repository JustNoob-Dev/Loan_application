<?php
	
	include('../includes/connect.php');
	$id=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from tblloanapplication where MID='$id'");
	$arow=mysqli_fetch_array($a);
	$x = 'REJECTED';
	if ($arow['status']!==$x){
		?>
		<script>
			window.alert('Loan Application Successfuly REJECTED!');
			window.history.back();
		</script>
	<?php
        mysqli_query($conn, "UPDATE `tblloanapplication` SET `status`='$x' where MID='$id'");
    }else{
                 ?>
		<script>
			window.alert('Loan Application Already REJECTED!');
			window.history.back();
		</script>
	<?php
    }
?>