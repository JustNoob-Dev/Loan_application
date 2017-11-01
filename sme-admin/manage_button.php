<!-- dito yung Delete loan -->
    <div class="modal fade" id="delloan_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Reject Loan Application</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from tblloanapplication where MID='$pid'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Are you sure you want to Reject this loan application ? <!--<strong><!?php echo $b['loan_type']; ?></strong>--></center></h5>
					<form role="form" method="POST" action="delloan.php<?php echo '?id='.$pid; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Yes</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!--dito nmn yung sa ano alam mo na to approve loan -->
    <div class="modal fade" id="apploan_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Loan Application</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"SELECT * FROM tblaccounts LEFT JOIN tblloanapplication ON tblloanapplication.MID = tblaccounts.AID LEFT JOIN tblmember ON tblmember.AID = tblaccounts.AID WHERE tblaccounts.AID ='$pid'");
						$b=mysqli_fetch_array($a);
                        $name=$b['fname'];
                        $mname=$b['mname'];
                        $lname=$b['lname'];
                        $fullname = $lname.", ".$name." ".$mname.". ";
                        if($b['account_lvl']=="1"){
                          $b['account_lvl'] = "BRONZE";  
                            
                        }elseif($b['account_lvl']=="2"){
                            
                            $b['account_lvl'] = "SILVER";  
                            
                        }elseif($b['account_lvl']=="3"){
                            
                            $b['account_lvl'] = "GOLD";  
                        }
                        
                    
                    
                    
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="app_loan.php<?php echo '?id='.$pid; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Borrower name:</span>
                            <input disabled type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($fullname); ?>" class="form-control" name="name">
                        </div> 
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Account Level:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['account_lvl'] ?>" class="form-control" name="price">
                        </div>
                         <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Birthday:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['bday'] ?>" class="form-control" name="price">
                        </div>
                        
                         <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Gender:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['gender'] ?>" class="form-control" name="price">
                        </div>
                        <div style="height:10px;"></div>
						 <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Type Of Loan:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['loan_type'] ?>" class="form-control" name="price">
                        </div>
                        <div style="height:10px;"></div>
                           <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Loan Ammount:</span>
                            <input disabled type="text" style="width:400px;" value="₱<?php  echo $b['loan_amount'] ?>" class="form-control" name="price">
                        </div>
                           <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Interest rate:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['interest'] ?>%" class="form-control" name="price">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Total Loan Ammount:</span>
                            <input disabled type="text" style="width:400px;" value="₱<?php echo $b['total_loan'] ?>" class="form-control" name="price">
                        </div>
						<div style="height:10px;"></div>
						 <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Type Of payment:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['loan_type_pay'] ?>" class="form-control" name="price">
                        </div>
                        <div style="height:10px;"></div>
						 <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Amount per Payment:</span>
                            <input disabled type="text" style="width:400px;" value="₱<?php echo $b['payment'] ?>" class="form-control" name="price">
                        </div>
                        	<div style="height:10px;"></div>
						 <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Number Of payment:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['num_pay'] ?>" class="form-control" name="price">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Date Applied</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['loan_date'] ?>" class="form-control" name="price">
                        </div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Approved</button>
					</form>
                </div>
        </div>
        </div></div>

<!-- /.modal -->

<!-- Promote User -->
    <div class="modal fade" id="promoteuser_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">User Profile</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"SELECT * FROM tblaccounts LEFT JOIN tblloanapplication ON tblloanapplication.MID = tblaccounts.AID LEFT JOIN tblmember ON tblmember.AID = tblaccounts.AID WHERE tblaccounts.AID ='$pid'");
						$b=mysqli_fetch_array($a);
                        $name=$b['fname'];
                        $mname=$b['mname'];
                        $lname=$b['lname'];
                        $fullname = $lname.", ".$name." ".$mname.". ";
                        if($b['account_lvl']=="1"){
                          $b['account_lvl'] = "BRONZE";  
                            
                        }elseif($b['account_lvl']=="2"){
                            
                            $b['account_lvl'] = "SILVER";  
                            
                        }elseif($b['account_lvl']=="3"){
                            
                            $b['account_lvl'] = "GOLD";  
                        }
                        
                    
                    
                    
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="promoteuser.php<?php echo '?id='.$pid; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Borrower name:</span>
                            <input disabled type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($fullname); ?>" class="form-control" name="name">
                        </div> 
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Account Level:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['account_lvl'] ?>" class="form-control" name="price">
                        </div>
                         <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Birthday:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['bday'] ?>" class="form-control" name="price">
                        </div>
                        
                         <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Gender:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['gender'] ?>" class="form-control" name="price">
                        </div>
                        <div style="height:10px;"></div>
                           <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Address:</span>
                            <input disabled type="text" style="width:400px;" value="<?php  echo $b['address'] ?>" class="form-control" name="price">
                        </div>
                          <div style="height:10px;"></div>
                           <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Email Address:</span>
                            <input disabled type="text" style="width:400px;" value="<?php  echo $b['email'] ?>" class="form-control" name="price">
                        </div>
                           <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Contact Number:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['contact'] ?>" class="form-control" name="price">
                        </div>
                        	<div style="height:10px;"></div>
						 <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Loan Status:</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['status'] ?>" class="form-control" name="price">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Date Applied</span>
                            <input disabled type="text" style="width:400px;" value="<?php echo $b['loan_date'] ?>" class="form-control" name="price">
                        </div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Promote</button>
					</form>
                </div>
        </div>
        </div></div>

<!-- /.modal -->
<!-- Demote  user -->
    <div class="modal fade" id="demoteuser_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Demote User</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from tblloanapplication where MID='$pid'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Are you sure you want to DEMOTE this user account ? <!--<strong><!?php echo $b['loan_type']; ?></strong>--></center></h5>
					<form role="form" method="POST" action="demoteuser.php<?php echo '?id='.$pid; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Yes</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->



