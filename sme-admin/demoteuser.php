<?php
	
	include('../includes/connect.php');
	$id=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from tblaccounts where AID='$id'");
	$arow=mysqli_fetch_array($a);
$y = '1';    
$x = '2';
  if($arow['account_lvl']==3){
 mysqli_query($conn, "UPDATE `tblaccounts` SET `account_lvl` = '$x' WHERE `tblaccounts`.`AID` = '$id'");
        ?>
		<script>
			window.alert('You have Successfully DEMOTED This account!');
			window.history.back();
		</script>
	<?php             
   }
elseif($arow['account_lvl']==2){
 mysqli_query($conn, "UPDATE `tblaccounts` SET `account_lvl` = '$y' WHERE `tblaccounts`.`AID` = '$id'");
        ?>
		<script>
			window.alert('You have Successfully DEMOTED This account!');
			window.history.back();
		</script>
	<?php             
	
    }else{
          
      
   ?>
            <script>
			window.alert('You Cannont Demote this Account!');
			window.history.back();
		</script>
		
	<?php
      
    }
?>