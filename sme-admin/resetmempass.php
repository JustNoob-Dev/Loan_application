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
    <li class="header">Admin Panel</li>
   <li><a href="../index.php"><i class="fa fa-home"></i> <span>SME Website | Homepage </span></a></li>
    <li><a href="manageloan.php"><i class="fa fa-edit"></i> <span> Loan Application</span></a></li>
    
    
     <li class="treeview active">
        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span>Member Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i></span>
          </a>
        <ul class="treeview-menu active">
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
    
    <li>
        <a href="#"><i class="fa fa-user"></i> <span>Account Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="profile.php#changeUser">Change Username</a></li>
            <li><a href="profile.php#changePass">Change Password</a></li>
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
        Reset Member password
        <small></small>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li >Member Management</li>
    <li class="active">reset password</li>
      </ol>
    </section>
    
<section class="content">
    <div class="col-md-5">
        <div class="box box-success">
            <div class="box-header">
                <i class="glyphicon glyphicon-search"></i>
                <h3 class="box-title">Search Member</h3>
            </div>
            <div class="box-body chat" id="chat-box">
                <form method="POST" action="">
                    <div class="input-group">
                        <input name='q' onkeypress='return alpha(event,letters)' id="system-search" class='form-control' placeholder="Type member username here...." ;/>
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-success" name="Search">Search</button>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
            <div class="col-md-9">
                <table class="table table-list-search">
                    <thead>
                        <tr>
                            <th><i>User ID</i></th>
                            <th><i>Username</i></th>
                            <th><i>Account Level</i></th>
                            <th><i>Reset Password</i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- code na pag click lalabas yung kaparehas nung input sa table parang search kung baga -->
                        <?php require '../includes/connect.php';
 if(isset($_POST['q'])) {
$search= $_POST['q'];
$s = 1;
$query = "SELECT * FROM tblaccounts WHERE account_type ='$s' and username LIKE '%$search%'";
$results = mysqli_query($conn, $query);
     if(mysqli_num_rows($results) >= 0) {
      while($row = mysqli_fetch_array($results)) {
          $id =  $row['AID'];
          $_GET['id'] = $id;
          $username =  $row['username'];
          $lvl = $row['account_lvl']; 
                    ?>

                        <tr>
                            <td>
                                <?php echo $id; ?>
                            </td>
                            <td>
                                <?php echo $username; ?>
                            </td>
                            <td>
                                <?php echo $lvl; ?>
                            </td>
                            <td><a style="height: 25px" class="label label-info" href="resetpass.php?id=<?php echo $_GET['id']; ?>">Reset Pass</a></td>
                        </tr>
              
                        <?php
           
      }}}
         ?>
                   
                    </tbody>

                </table>
            </div>

        
           
         
           
           
           
            <!-- /.chat -->
            <div class="box-footer">
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
    