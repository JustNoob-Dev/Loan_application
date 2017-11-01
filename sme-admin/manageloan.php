<?php 
session_start();
require '../includes/connect.php';
include '../includes/header.php';
include 'header.php';
$x=mysqli_query($conn,"SELECT * FROM tblaccounts WHERE AID='".$_SESSION['aid']."'");
	$n=mysqli_fetch_array($x);
	if (($n['account_type']==1) || (!isset($_SESSION['ses_user']))){

     header("location: index.php");

 }
        
else{
?>
<!DOCTYPE html>
<html>
<head>

</head>
   <body class="hold-transition skin-green sidebar-mini">
 
<div class="wrapper">
  <header class="main-header">
    <a href="../index.php" class="logo">
      <span class="logo-mini"><b>S</b>ME</span>
      
        <span class="logo-lg">Card <b>SME</b> Bank</span>
    </a>
    
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../images/cardsmebank.png"  class="user-image" alt="User Image"/>
              
              <span class="hidden-xs"><?php echo $_SESSION['ses_user']?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
       <!--        pwede ka mag lagay ng image dito
                <p>
                  - Admin
                  <small>lagay k ng kahit ano dito </small>-->
                </p>
              </li>
              <li class="user-footer">
             <!--   <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <aside class="main-sidebar">
    <section class="sidebar">
     

<ul class="sidebar-menu">
    <li class="header">Admin Panel</li>
    <li><a href="../index.php"><i class="fa fa-home"></i> <span>SME Website | Homepage </span></a></li>
    <li class="treeview active"><a href="manageloan.php"><i class="fa fa-edit"></i> <span> Loan Application</span></a></li>
    
    
     <li>
        <a href="smemem.php"><i class="fa fa-users" aria-hidden="true"></i> <span>Member Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i></span>
          </a>
        <ul class="treeview-menu">
            <li><a href="smemem.php"><i class="fa fa-globe"></i>Card <b>SME</b> Member</a></li>
            <li><a href="resetmempass.php"><i class="glyphicon glyphicon-cog"></i>Reset Member Password</a></li>
        </ul>
    </li>

     <li>
        <a href="#"><i class="fa fa-gears"></i> <span>Configuration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i></span>
          </a>
        <ul class="treeview-menu">
            <li><a href="profile.php"><i class="fa fa-university"></i>Company Profile</a></li>
            <li><a href="loan_interest.php"><i class="fa fa-key"></i>Loan Interest</a></li>
        </ul>
    </li>
 <li><a href="chat.php"><i class="fa fa-weixin"></i> <span> Live Chat Support</span></a></li>
    <li><a href="report.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span> Reports</span></a></li>
      </ul>
     
    </section>
    
  </aside>
  
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
       Loan Application Management
        <small></small>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">Loan Management</li>
      </ol>
    </section>
  <div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
           <h1 class="page-header">
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
                        <th>Loan Application ID</th>
						<th>Borrower Name</th>
                        <th>Account level</th>
						<th>Date of Application</th>
						<th>Status</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$pq=mysqli_query($conn,"SELECT * FROM tblloanapplication LEFT JOIN tblaccounts ON tblaccounts.AID = tblloanapplication.MID");
					while($pqrow=mysqli_fetch_array($pq)){
                        if($pqrow['account_lvl']=="1"){
                          $pqrow['account_lvl'] = "BRONZE";  
                            
                        }elseif($pqrow['account_lvl']=="2"){
                            
                            $pqrow['account_lvl'] = "SILVER";  
                            
                        }elseif($pqrow['account_lvl']=="3"){
                            
                            $pqrow['account_lvl'] = "GOLD";  
                        }
						$pid=$pqrow['AID'];
                        $name=$pqrow['fname'];
                        $mname=$pqrow['mname'];
                        $lname=$pqrow['lname'];
                        $fullname = $lname.", ".$name." ".$mname.". ";
                        
					?>
						<tr>
						    <td><?php echo $pqrow['LID']; ?></td>
							<td><?php echo $fullname; ?></td>
							<td><?php echo $pqrow['account_lvl'];; ?></td>
							<td><?php echo $pqrow['loan_date']; ?></td>
							<td><?php echo $pqrow['status']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#apploan_<?php echo $pid; ?>"><i class="fa fa-edit"></i> Approved</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delloan_<?php echo $pid; ?>"><i class="fa fa-trash"></i> REJECT</button>
							    <?php include('manage_button.php'); ?>
							</td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
            <div class="box-footer">
            </div>
        </div>

  
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
        <i class="fa fa-bug"></i> For Thesis Purposes
    </div>
  <strong>Copyright &copy;<?php echo date("Y") ;?><a href="http://www.facebook.com/JM.JustinMarc"> Webmaster</a>.</strong> All rights reserved.
		</footer>
  
</div> 


    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.js"></script>
    <script src="../dist/js/demo.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
   
<script src="custom.js"></script>
  <?php } ?>
  </body>
  </html>
    