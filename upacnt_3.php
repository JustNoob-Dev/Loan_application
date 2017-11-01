<?php
session_start();
include 'includes/connect.php';
include 'includes/header.php';
include 'smenav.php';
if(!isset($_SESSION['ses_user'])){
    header("location: index.php");
}else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
 <legend><MARQUEE>UPGRADE YOUR ACCOUNT</MARQUEE></legend>
<div class="container"> <br />
    <div class="row">
<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Instruction</strong><small></small></div>
				<div class="panel-body">
					
				
*Please provide a clear image(s) of any of the documents needed.</br>
*Provide a Valid Bank Account Number </br>
*Remember your Barangay certificate must be valid and least one month before expiration.</br>
*<b>Note: </b> Please provide us <i>Complete and Right information</i> For faster Transaction!  
   </br>
    
</div>
</div>
</div>
<div class="col-md-6">
     <div class="panel panel-default">
        <div class="panel-heading"><strong>Bank Account</strong> <small>  number</small></div>
        <div class="panel-body">
          <form action="" method="post" enctype="multipart/form-data">
    
                    <input type="number" name="b" class="form-control" placeholder="0000-0000-00000-000" required /></br>
                   <!-- </span>-->
       <br/> <br/><br/>
                </div>
   
    </div>
    </div>
</div>
<div class="col-md-4">
    <button id="next" onclick="home()" name="next" class="btn-large btn btn-default btn-lg">
       Back
       </button>
    <button type="submit" id ="save" name="save" class="btn-large btn btn-success btn-lg">
       Done
       </button>
   
</div>




<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Credit Invistegation</strong> <small> </small></div>
        <div class="panel-body">
         *If you agree <i> Credit Invistegation</i> by checking the checkbox below,
            Will perform a visit to help us to determine your character and <b>capability to pay</bb>.
                    <input name="ci" class="form-control" value="1" type="checkbox" required>
       
                </div>
   
    </div>
</div>
<div class="col-md-4">
</div>


<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Barangay Certificate</strong> <small> </small></div>
        <div class="panel-body">
                    <input class="form-control" type="file" name="file" required /></br>
        </div>
    </div>
</div>


<?php
if(isset($_POST['save'])){
if(isset($_FILES['file']['tmp_name'])){
$x=$_SESSION['aid'];
$c=$conn->escape_string($_POST['ci']);
$b=$conn->escape_string($_POST['b']);
$uploads_dir = 'mem_save/brgy_cert';
$file_name = $_FILES['file']['name'];
$ID="$uploads_dir/$file_name";
    
$sql = "UPDATE `tblmember` SET `bankacct_num`='$b', `CI` = '$c', `brgry_cerft`='$ID' WHERE `tblmember`.`AID` = '$x'";
$result = $conn->query($sql);  
    if($result){
    if(move_uploaded_file($_FILES["file"]["tmp_name"],"$uploads_dir/$file_name")){
           
         echo '<script language="javascript">';
		    echo 'alert("Succesfully Save!"); location.href="myloan.php"';
		    echo '</script>';   
            
            
    } 
    
    }else {
        echo '<script type="text/javascript">',
    'alert("Mali")';
    }
}else {

echo '<script type="text/javascript">',
    'alert("No Image Found!")';
    }
}
?>

</form>
</div>
</div>
</div>
</div>







<script type="text/javascript">
    
      
     function home(){
      window.location.href = "upacnt_2.php";
    }
 
</script>
<?php } ?>
</body>
</html>