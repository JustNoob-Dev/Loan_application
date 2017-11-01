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

</head>
  
  <style>.blue { background: blue }
.grey { background: grey }
.chats-row { height: 100vh; }
.chats-row div { 
    height: 50%;
    border: 1px solid #ddd;
    padding: 0px; 
}

.list-group-item {
    border: none;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    
}
.list-group-item:first-child {
    border-top: none;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}


.current-chat { 
    height: 100vh; 
    border: 1px solid #ddd;
}

.chat-toolbar-row {
    background-color: #f5f5f5;
}

.chat-toolbar {
    margin-top: 10px;
    margin-bottom: 10px;
}

.current-chat-area {
    padding-top: 10px;
    overflow: auto;
    height: 85vh;
}

.current-chat-footer {
    position: absolute;
    bottom: 0;
    
}
</style>
  
  
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
               <!--pwede ka mag lagay ng image dito-->
                <p>
                  <!--- Admin
                  <small>lagay k ng kahit ano dito </small>-->
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
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
    <li class="header">Control Panel</li>
 <li><a href="../index.php"><i class="fa fa-home"></i> <span>SME Website | Homepage </span></a></li>
    <li><a href="manageloan.php"><i class="fa fa-edit"></i> <span> Loan Application</span></a></li>
    
    
     <li>
        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span>Member Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i></span>
          </a>
        <ul class="treeview-menu">
            <li><a href="smemem.php"><i class="fa fa-globe"></i>Card <b>SME</b> Member</a></li>
            <li><a href="resetmempass.php"><i class="glyphicon glyphicon-cog"></i>Reset Member Password</a></li>
        </ul>
    </li>

     <li>
        <a href="profile.php"><i class="fa fa-gears"></i> <span>Configuration</span>
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
      <h1> Card SME Bank Summary Report
       <small></small>
          <small></small>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
       <li class="active">Report</li>
      </ol>
    </section>
    <section class="content">
      
   <?php
            $nm = mysqli_query($conn,"SELECT COUNT(*) as 'NoOfMale' FROM tblaccounts WHERE gender='Male' ");
                $noOfMale=mysqli_fetch_array($nm);
$nf = mysqli_query($conn,"SELECT COUNT(*) as 'NoOfFemale' FROM tblaccounts WHERE gender='Female'");
                $noOfFemale=mysqli_fetch_array($nf);     
$totalUser = $noOfMale['NoOfMale'] + $noOfFemale['NoOfFemale'];
            ?>
                 
   <section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="info-box bg-green-gradient">
                <span class="info-box-icon bg-green"><i class="fa fa-male"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Male</span>
                    <span class="info-box-number"><?php echo $noOfMale['NoOfMale']?></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
                 <div class="info-box bg-green-gradient">
                <span class="info-box-icon bg-green"><i class="fa fa-female"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Female</span>
                    <span class="info-box-number"><?php echo $noOfFemale['NoOfFemale']?></span>
                </div>
            </div>
        </div>
            <div class="col-md-4">
                     <div class="info-box bg-green-gradient">
                <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total User</span>
                        <span class="info-box-number"><?php echo $totalUser ?></span>
                    </div>
                </div>
            </div>
        </div>
           
        <?php 
       		$pq=mysqli_query($conn,"SELECT * FROM tblloanapplication LEFT JOIN tblaccounts ON tblaccounts.AID = tblloanapplication.MID");
					while($pqrow=mysqli_fetch_array($pq)){}
       
       ?>
 
      
      
       
   <?php
$nm = mysqli_query($conn,"SELECT COUNT(*) as 'NoOfapp' FROM `tblloanapplication` WHERE status='APPROVED' ");
                $noOfapp=mysqli_fetch_array($nm);
$nf = mysqli_query($conn,"SELECT COUNT(*) as 'NoOfrejec' FROM tblloanapplication WHERE status='REJECTED' ");
                $noOfrejec=mysqli_fetch_array($nf);     
$ng = mysqli_query($conn,"SELECT COUNT(*) as 'NoOfpend' FROM tblloanapplication WHERE status='PENDING' ");
                $noOpend=mysqli_fetch_array($ng);  
$totall = $noOfapp['NoOfapp'] + $noOfrejec['NoOfrejec'];
     
            ?>
      
          
        
           <!-- Apply any bg-* class to to the info-box to color it -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"></span>
          <span class="info-box-number">Pending Application</span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            <?php echo $noOpend['NoOfpend'];?>
          </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
        
          
           <!-- Apply any bg-* class to to the info-box to color it -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"></span>
          <span class="info-box-number">Approved Application</span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            <?php echo $noOfapp['NoOfapp'];?>
          </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
      
        
          
           <!-- Apply any bg-* class to to the info-box to color it -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"></span>
          <span class="info-box-number">Rejected Applicattion</span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            <?php echo $noOfrejec['NoOfrejec'];?>
          </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
      
            
      

      
      
      
      
      
      
      
      
      
      
    </section>
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

    <?php }?>
  </body>
  </html>
