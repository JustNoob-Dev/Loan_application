<!DOCTYPE html>
<?php
session_start();
require 'smenav.php';
require 'includes/header.php';
include 'includes/connect.php';
if(!isset($_SESSION['ses_user'])){
    header("location: index.php");
}else{
?>

   <style>              input.hidden {
    position: absolute;
    left: -9999px;
}
       
       
       body{
           background-image: url(images/gren.png);
           
       }
               .modal-header-success {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5cb85c;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
       
       #g{
               max-width: 500px;
    margin: auto;
       }

#profile-image1 {
    cursor: pointer;
  
     width: 100px;
    height: 100px;
	border:2px solid #11bc24 ;}
	.tital{ font-size:16px; font-weight:500;}
	 .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}	</style>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style="image-background: url(images/gren.png)">
<?php
    
 $id = $_SESSION['aid']; 
    $a=mysqli_query($conn,"SELECT * FROM tblaccounts LEFT JOIN tblloanapplication ON tblloanapplication.MID = tblaccounts.AID LEFT JOIN tblmember ON tblmember.AID = tblaccounts.AID WHERE tblaccounts.AID ='$id'"); $arow=mysqli_fetch_array($a); $name=$arow['fname']; $mname=$arow['mname']; $lname=$arow['lname']; $fullname = $lname.", ".$name." ".$mname.". "; 
    $num_pay=$arow['num_pay'];
    $y = $arow['total_loan'];
     $z = $arow['payment'];
    if($arow['account_lvl']=="1"){ $arow['account_lvl'] = "BRONZE"; }elseif($arow['account_lvl']=="2"){ $arow['account_lvl'] = "SILVER"; }elseif($arow['account_lvl']=="3"){ $arow['account_lvl'] = "GOLD"; }
    ?>
<br>
<hr>
<div class="container">
<button type="button" id="g" class="btn btn-success" onclick="home()">
    <i class="fa fa-id-card-o" aria-hidden="true">Home</i>
</button>
                   <script>
    function home() {
        window.location.href = "index.php";
    }
</script>


<button type="button" id="g" class="btn btn-success" data-toggle="modal" data-target="#userprofileModal">
    <i class="fa fa-id-card-o" aria-hidden="true">My Profile</i>
</button>

<?php $query=mysqli_query($conn,"SELECT * FROM tblloanapplication WHERE MID='".$id."'");
	$numrows=mysqli_num_rows($query);
	if($numrows==0){ ?>
           <button type="button" id="g" class="btn btn-success" data-toggle="modal" data-target="#walaModal">
    <i class="fa fa-id-card-o" aria-hidden="true">Loan Application status</i>
</button>  
    
    <?php }else{ ?>
    <button type="button" id="g" class="btn btn-success" data-toggle="modal" data-target="#transacModal">
    <i class="fa fa-id-card-o" aria-hidden="true">Loan Application status</i>
</button>  
   
   <?php }
?>
   



<div class="modal fade" id="userprofileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <div class="panel-heading">
                    <h4>User Profile</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="col-sm-6">
                            <div align="center"> <img alt="User Pic" src="images/userprofile.jpg" id="profile-image1" class="img-circle img-responsive">
                          <!--      <input id="profile-image-upload" class="hidden" type="file">-->
                            </div>
                            <br>
                            <!-- /input-group -->
                        </div>
                        <div class="col-sm-6">
                            <h4 style="color:#1bb243;">
                                <?php echo ucwords($fullname); ?> </h4>
                            </span>
                            <span><p><?php echo $arow['account_lvl']; ?></p></span>
                        </div>
                        <div class="clearfix"></div>
                        <hr style="margin:5px 0 5px 0;">

                        <form action="" method="post">
                        <div class="col-sm-5 col-xs-6 tital ">First Name:</div>
                        <div class="col-sm-7 col-xs-6 ">
                           <input required onkeypress="return alpha(event,letters)" type="text" class="form-control" value="<?php echo $arow['fname']; ?>" name="fname">
                        </div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>

                        <div class="col-sm-5 col-xs-6 tital ">Middle Name:</div>
                        <div class="col-sm-7">
                            <input required type="text" onkeypress="return alpha(event,letters)" maxlength="2" class="form-control" value="<?php echo $arow['mname']; ?>" name="mname">
                        </div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>

                        <div class="col-sm-5 col-xs-6 tital ">Last Name:</div>
                        <div class="col-sm-7">
                            <input required type="text" onkeypress="return alpha(event,letters)" class="form-control" value="<?php echo $arow['lname']; ?>" name="lname">
                        </div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>

                        <div class="col-sm-5 col-xs-6 tital ">Date Of Birth:</div>
                        <div class="col-sm-7">
                            <input required type="date" class="form-control" value="<?php echo $arow['bday']; ?>" name="bday">
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>

                        <div class="col-sm-5 col-xs-6 tital ">Gender:</div>
                        <div class="col-sm-7">
                            <input required type="text" onkeypress="return alpha(event,letters)" class="form-control" value="<?php echo $arow['gender']; ?>" name="gender"> 
                        </div>

                        <div class="clearfix"></div>
                        <div class="bot-border"></div>

                        <div class="col-sm-5 col-xs-6 tital ">Address:</div>
                        <div class="col-sm-7">
                             <input required type="text" onkeypress="return alpha(event,letters+numbers)" class="form-control" value="<?php echo $arow['address']; ?>" name="address">
                        </div>

                        <div class="clearfix"></div>
                        <div class="bot-border"></div>

                        <div class="col-sm-5 col-xs-6 tital ">Contact Number:</div>
                        <div class="col-sm-7">
                            <input required type="text" onkeypress="return alpha(event,numbers)"  maxlength="11" class="form-control" value="<?php echo $arow['contact']; ?>" name="contact" maxlength="11">
                        </div>


                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

            </div>
                  <hr >
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php 
                if($arow['account_lvl']=="GOLD"){ ?>
                   <button onclick="upacnt()" disabled type="button" class="btn btn-secondary">Improve My Account</button> 
              <?php  }else{
                ?>
                <button onclick="upacnt()" type="button" class="btn btn-secondary">Upgrade</button>
                <?php  } ?>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
          </form>
            </div>
        </div>
    </div>
</div>
        
         <div id="ercModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header-success">
                        <h4 class="modal-title" id="myModalLabel">Error Alert!</h4>
                        </div>
                        <div class="modal-body">
                        <label class="modal-title" id="myModalLabel">Try Again(I think this is my fault not you yeah you user)!</label>
                        <p>To User: Can you Please </p>
                        <div class="imgcontainer">
                        <img src="images/useit.png" alt="Avatar" class="avatar">
                        </div>
                        <p><i>And refersh this page!</i></p>
                        </div>
                        <div class="modal-footer">
                         <button type="button" class="btn btn-warning" data-dismiss="modal">I dont have a brain</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok i`ll try</button>
                        </div>
                        </div>
                        </div>
                        </div>
        
        
        <div id="scModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header-success">
                        <h4 class="modal-title" id="myModalLabel">Successfully Updated!</h4>
                        </div>
                        <div class="modal-footer">
                        </div>
                        </div>
                        </div>
                        </div>
        
        
        
        
        <?php
if(isset($_POST["submit"])){
include 'includes/connect.php';
        
    $fname=$conn->escape_string($_POST['fname']);
    $mname=$conn->escape_string($_POST['mname']);
    $lname=$conn->escape_string($_POST['lname']);
    $gender=$conn->escape_string($_POST['gender']);
    $bday=$conn->escape_string($_POST['bday']);
	$address=$conn->escape_string($_POST['address']);
	$contact=$conn->escape_string($_POST['contact']);
 
$sql = "UPDATE `tblaccounts` SET `fname`='$fname', `mname`='$mname', `lname`='$lname', `gender`='$gender', `bday`='$bday'  WHERE AID=".$_SESSION['aid']."";
$result = $conn->query($sql);  
$sql = "UPDATE `tblmember` SET `address`='$address', `contact`='$contact' WHERE AID=".$_SESSION['aid']."";
$result = $conn->query($sql); 
if($result){
        
      echo   
    "<script>

    location.href='myloan.php';
    </script>";
    
  
    
}else{
    
      echo   
    "<script>
    $('#ercModal').modal('show');
    </script>";
    
}
    
       }
    ?>
        
        
        
        
        <script>
    function upacnt() {
        window.location.href = "upacnt.php";
    }
</script>
        
<?php
						$x=mysqli_query($conn,"select * from tblaccounts where AID=".$_SESSION['aid']."");
						$a=mysqli_fetch_array($x);
 
					?>
         <!-- my transaction-->
    
    <div id="transacModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
            <?php echo $fullname; ?>
            </h4>
          <h6 class="modal-title" id="classModalLabel">
              Account #<?php echo $a['AID'];?>
              
          </h6>        
      </div>
      <div class="modal-body">
        <table id="classTable" class="table table-bordered">
          <thead>
          </thead>
          <tbody>
            <tr>
              <td>Loan Application ID</td>
              <td>Date Applied</td>
              <td>Type</td>
              <td>Status</td>
            </tr>
            <tr>
						    <td><?php echo $arow['LID']; ?></td>
							<td><?php echo $arow['loan_date']; ?></td>
							<td><?php echo $arow['loan_type']; ?></td>
							<td><?php echo $arow['status']; ?></td>
              </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>

  <div id="walaModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
            Theres No Existing Loan Application!!
            </h4>
          <h6 class="modal-title" id="classModalLabel">
            
          </h6>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>

<!--<TABLE width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
    <tr>
        <td>
            <!?php echo $arow['loan_type']; ?>
        </td>
        <td>Amount</td>
        <td>Principal</td>
        <td>Balance</td>
        <td>Status</td>
    </tr>
    <!?php
  for ($x = 1; $x <= $num_pay; $x++){
     echo "<TR><TD class='x'>$x</TD>";
      ?>
        <td>₱
            <@!?php echo $arow['payment']; ?>
        </td>
        <!?php
          echo "<TD id='principal_$x'>₱ $y  </TD>"; 
          $y -= $z; 
      ?>
            <!?php  
      if($y > 0){
      echo "<TD id='bal_$x' >₱ $y  </TD>"; 
      }else {
          echo "<TD>₱ 0.00 </TD>";  
      }
        ?>
            <td><button class="btn btn-success" id="show_bal"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Paid</button></td>
            <!?php  } ?>
            </tr>

            
</TABLE>
   -->
   
    <!--<!script>
  
 
  
        $(document).ready(function()
{       //on ready hide the td details
    var a = <!?php echo $num_pay ?>;        
    var i=1;      
    
for (; i < a; i++) {   
    var bal= document.getElementById('bal_'+i); 
    bal.style.visibility="hidden";
   $('#show_bal').click(function(){
   document.getElementById('principal_2').style.visibility="";
   bal.style.visibility="";
    bal.style.visibility="";
        bal.style.visibility="";
    });
                
}

});
        
        
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script> 
  -->
</div>
    </div>
    
</body>
<?php 
    include 'chat.php';
}
?>
</html>