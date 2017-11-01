<?php
	
	include('../includes/connect.php');
	$id=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from tblaccounts where AID='$id'");
	$arow=mysqli_fetch_array($a);
$y = '3';    
$x = '2';
  if($arow['account_lvl']==1){
 mysqli_query($conn, "UPDATE `tblaccounts` SET `account_lvl` = '$x' WHERE `tblaccounts`.`AID` = '$id'");
        ?>
		<script>
			window.alert('You have Successfully PROMOTED This account!');
			window.history.back();
		</script>
	<?php             
   }
elseif($arow['account_lvl']==2){
 mysqli_query($conn, "UPDATE `tblaccounts` SET `account_lvl` = '$y' WHERE `tblaccounts`.`AID` = '$id'");
        ?>
		<script>
			window.alert('You have Successfully PROMOTED This account!');
			window.history.back();
		</script>
	<?php             
	
    }else{
          
      
   ?>
            <script>
			window.alert('This Account Reach its limit!');
			window.history.back();
		</script>
		
	<?php
      
    }
?>