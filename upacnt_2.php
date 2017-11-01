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
*ID must show birthdate</br>
*ID must have at least one month before expiration</br>
*Remember your ID must be valid and not expired.</br>
   </br>
    
</div>
</div>
</div>
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Goverment ID</strong> <small> </small></div>
        <div class="panel-body">
            <form action="" method="POST" enctype="multipart/form-data">
                    <input class="form-control" type="file" name="file" required /></br>
            
           
                </div>
    
              
    
    <?php

if(isset($_FILES['file']['tmp_name'])){
    if (!isset($_FILES['file']['tmp_name'])){
                    echo "no image found";
    }
    
$sgt=$conn->escape_string($_POST['sgt']);
$soi=$conn->escape_string($_POST['soi']);
$x=$_SESSION['aid'];
$uploads_dir = 'mem_save/gov_id';

$file_name = $_FILES['file']['name'];
$ID="$uploads_dir/$file_name";

    
$sql = "UPDATE `tblmember` SET `gov_id` = '$ID', `sgtin_num` = '$sgt', `source_inc`='$soi' WHERE `tblmember`.`AID` = '$x'";
$result = $conn->query($sql);  
    if(move_uploaded_file($_FILES["file"]["tmp_name"],"$uploads_dir/$file_name")){
           
         echo '<script language="javascript">';
		    echo 'alert("Succesfully Save!"); location.href="upacnt_3.php"';
		    echo '</script>';   
            
            
    } 
    
    
    else {

echo '<script type="text/javascript">',
    'alert("No Image Found!")';
    }
}
?>

        
        
        
        
        
        <br/>
        <br/><br/>
        
        
        </div>
    </div>
</div>
<div class="col-md-4">
    <button id="next" onclick="home()" name="next" class="btn-large btn btn-default btn-lg">
      Back
       </button>
    <button type="submit" id ="save" name="save" class="btn-large btn btn-success btn-lg">
       Next
       </button>
   
</div>




<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>SSS/GSIS/TIN</strong> <small>  number</small></div>
        <div class="panel-body">
          
                    <input type="number" name="sgt" class="form-control" placeholder="SSS/GSIS/TIN number.." required /></br>
                   <!-- </span>-->
       
                </div>
   
    </div>
</div>
<div class="col-md-4">
</div>




<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Source of Income</strong> <small> </small></div>
        <div class="panel-body">
          
                                                    <Select name="soi" required type="text" class="form-control" required id="soi">
                                                    <option> --- Choose Source of Income ---</option>
                                                    <option value="Employed" >Employed</option>
                                                    <option value="Self Employed" >Self Employed</option>
                                                    <option value="Student/Retired/Unemployed" >Student/Retired/Unemployed</option>
                                                    </select>
                                                    </div>
                                                    </div>
                </div>
     </form>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
    


  

      
     function home(){
      window.location.href = "upacnt.php";
    }
 
</script>
<?php } ?>
</body>
</html>