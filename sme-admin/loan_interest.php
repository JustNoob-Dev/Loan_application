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
               <!--pwede ka mag lagay ng image dito
                <p>
                  - Admin
                  <small>lagay k ng kahit ano dito </small>-->
                </p>
              </li>
              <li class="user-footer">
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

     <li class="treeview active">
        <a href="#"><i class="fa fa-gears"></i> <span>Configuration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i></span>
          </a>
        <ul class="treeview-menu active">
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
        Modify Loan Interest rate
        <small></small>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li >Configuration</li>
      <li class="active">Config</li>
      </ol>
    </section>
    
    <section class="content">
       <div class="col-md-5">
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-money"></i>
              <h3 class="box-title">Current Interest Rate</h3>
            </div>
            <div class="box-body chat" id="chat-box">
              <form  method="POST" action="changeint.php">
                <div class="input-group">
                  <?php 
              include '../includes/connect.php';
                        // query sa baba para ma select yung pinakabagong lagay sa db para sa pic lng nmn yan
                        $sql=mysqli_query($conn,"SELECT * FROM `tblinterest` ORDER BY `tblinterest`.`IID` DESC LIMIT 1");
                        // fetch yung data sa db
						while ($row = mysqli_fetch_assoc($sql)) {
                         
                            // pinalabas ko yung value sa db 
                        echo   "<input name='interest' onkeypress='return alpha(event,numbers)' class='form-control' placeholder=".$row['loan_interest']."%>";
                             } 
   
              ?> 
                  <div class="input-group-btn">
                    <input type="submit" class="btn btn-success" name="submit"><i class="fa fa-plus"></i></input>
                  </div>
                </div>
              </form>   
              <hr>
            </div>
            <!-- /.chat -->
            <div class="box-footer">
            </div>
          </div>
        </div>
<div class="col-md-6">
    <div class="box box-success">
        <div class="box-header">
            <i class="fa fa-history"></i>
            <h3 class="box-title">Loan Interest History</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
            <thead>
                <tr>
                    <th><i>Interest rate</i></th>
                    <th><i>Date</i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
$query = "SELECT * FROM tblinterest ORDER BY IID DESC LIMIT 10";
$results = mysqli_query($conn, $query);
     if(mysqli_num_rows($results) >= 0) {
      while($row = mysqli_fetch_array($results)) {
                    ?>
                <tr>
                    <td>
                        <?php echo $row['loan_interest'];?>%
                    </td>
                    <td>
                        <?php echo $row['datechange'];?>
                    </td>
                </tr>
                <?php
      }}
         ?>
            </tbody>
        </table>
              
              
              
              
              
       
            <!-- /.chat -->
            <div class="box-footer">
            </div>
          </div>
        </div>
        </div>
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
   
    <?php } ?>
  </body>
  </html>
    