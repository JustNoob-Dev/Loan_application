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
               <!--pwede ka mag lagay ng image dito-->
                <p>
                  <!--- Admin
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
        <a href="profile.php"><i class="fa fa-gears"></i> <span>Configuration</span>
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
Admin Panel
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li >Configuration</li>
       <li class="active">Company Profile</li>
      </ol>
    </section>
    
    <section class="content">
      
     <div class="col-md-5">
      
      
      <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>
              <h3 class="box-title">Suggestion/Inquiry</h3>
               <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            <div class="box-body chat" id="chat-box">
              <hr><br>
              <?php 
              include '../includes/connect.php';
                  
                 
                  
              $a=mysqli_query($conn,"SELECT * FROM `tblmessages` ORDER BY `datemess` DESC");
       	while($r=mysqli_fetch_array($a)){
                $date_posted = date("F j, Y, g:i a", $r["datemess"]);
                echo "
                <div class='item'>
                  <p class='message'>
                    <a href=".$r['email']." class='name'>
                      <small class='text-muted pull-right'><i class='fa fa-clock-o'> </i>".$date_posted."</small>
                      ".$r['name']."
                    </a>
                    ".$r['message']."<br><br><br>
                  </p>
                </div>
                ";
              }
              ?>
            </div>
            <!-- /.chat -->
            <div class="box-footer">
            </div>
          </div>
        </div>
        <div class="col-md-6">
         	<?php
						$x=mysqli_query($conn,"SELECT * FROM `tblcompany`");
						$z=mysqli_fetch_array($x);
					?>
      <div class="box box-success">
            <div class="box-header">
               <div class="panel panel-default">
        <div class="panel-heading"><strong>Company Profile</strong> <small>--Content Editor--</small></div>
        <form action="" method="post">
        <div class="panel-body">
    <i class="fa fa-list-alt" aria-hidden="true">   </i> <h3 class="box-title"> Title </h3>
           <hr>
           <input required tpye="text" name="title" placeholder="<?php echo $z['title']; ?>" class="form-control">
               <button type="submit" class="btn-group-justified btn-success" name="save1"><i class="fa fa-check-square-o" aria-hidden="true"></i></input>
            </div>
               </form>
               
               <form action="" method="post">
   <div class="panel-body">
   <i class="fa fa-th-list" aria-hidden="true">   </i>   <h3 class="box-title"> Main Content </h3>
           <hr>
           <input required tpye="text"  name="m" placeholder="<?php echo $z['m_content']; ?>" class="form-control" />
             <button type="submit" class="btn-group-justified btn-success" name="save2"><i class="fa fa-check-square-o" aria-hidden="true"></i></input>
            </div>
                   </form>
              
              
              <form action="" method="post">
               <div class="panel-body">
           <i class="fa fa-align-right" aria-hidden="true">   </i> <h3 class="box-title"> Sub Content </h3>
           <hr>
           <input tpye="text" name="s" placeholder="<?php echo $z['s_content']; ?>" class="form-control" />
             <button type="submit" class="btn-group-justified btn-success" name="save3"><i class="fa fa-check-square-o" aria-hidden="true"></i></input>
            </div>
                   </form>
                   
                   
                   
                  <form action="" method="post">
                   <div class="panel-body">
 <i class="fa fa-indent" aria-hidden="true">   </i>  <h3 class="box-title"> Footer Content </h3>
           <hr>
           <input required tpye="text" name="f" placeholder="<?php echo $z['f_content']; ?>" class="form-control" />
           
             <button type="submit" class="btn-group-justified btn-success" name="save4"><i class="fa fa-check-square-o" aria-hidden="true"></i></input>
            </div>
                   </form>
            
            <div class="box-footer">
                   </div>
                   
                   <?php
                   if(isset($_POST['save1'])){
                       $t=$_POST['title'];
                       mysqli_query($conn, "UPDATE `tblcompany` SET `title`='$t'");
                       ?>
        <script>
			window.alert('Successfully modified!');
		</script>
                   <?php } ?> 
                   <?php
                   if(isset($_POST['save2'])){
                       $m=$_POST['m'];
                       mysqli_query($conn, "UPDATE `tblcompany` SET `m_content`='$m'");
                       ?>
        <script>
			window.alert('Successfully modified!');
		</script>
                   <?php } ?>
                   
                   
                   
             <?php
                   if(isset($_POST['save3'])){
                       $s=$_POST['s'];
                       mysqli_query($conn, "UPDATE `tblcompany` SET `s_content`='$s'");
                       ?>
        <script>
			window.alert('Successfully modified!');
		</script>
                   <?php } ?>
            

                                <?php
                   if(isset($_POST['save4'])){
                       $f=$_POST['f'];
                       mysqli_query($conn, "UPDATE `tblcompany` SET `f_content`='$f'");
                       ?>
        <script>
			window.alert('Successfully modified!');
		</script>
                   <?php } ?>
                   
                   
                   
            </div>
          </div>
        
            </div>
            
            </div>
<div class="col-md-5">
</div>
<div class="col-md-6">
    <div class="box box-success">
        <div class="box-header">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Company Profile</strong> <small>--Content Editor--</small></div>
                <form action="" method="post">
                    <div class="panel-body">
                        <i class="fa fa-list-alt" aria-hidden="true">   </i>
                        <h3 class="box-title"> Title </h3>
                        <hr>
                        <input required tpye="text" name="st" placeholder="<?php echo $z['s_title']; ?>" class="form-control">
                        <button type="submit" class="btn-group-justified btn-success" name="save5"><i class="fa fa-check-square-o" aria-hidden="true"></i></input>
            </div>
               </form>
                                 
                                 
                                  <form action="" method="post">
        <div class="panel-body">
       <i class="fa fa-align-right" aria-hidden="true">   </i> <h3 class="box-title"> Content </h3>
           <hr>
           <input required tpye="text" name="sc" placeholder="<?php echo $z['s_s_content']; ?>" class="form-control">
               <button type="submit" class="btn-group-justified btn-success" name="save6"><i class="fa fa-check-square-o" aria-hidden="true"></i></input>
            </div>
               </form>
                                 
                                 
                                 
                                <form action="" method="post">
        <div class="panel-body">
    <i class="fa fa-indent" aria-hidden="true">   </i>  <h3 class="box-title"> Footer </h3>
           <hr>
           <input required tpye="text" name="sf" placeholder="<?php echo $z['s_f_content']; ?>" class="form-control">
               <button type="submit" class="btn-group-justified btn-success" name="save7"><i class="fa fa-check-square-o" aria-hidden="true"></i></input>
            </div>
               </form>
            
            
            <div class="box-footer">
            </div>
          </div>
        </div>
               
            
              <?php
                   if(isset($_POST['save5'])){
                       $f=$_POST['st'];
                       mysqli_query($conn, "UPDATE `tblcompany` SET `s_title`='$f'");
                       ?>
        <script>
			window.alert('Successfully modified!');
		</script>
                   <?php } ?>
            
            
<?php
                   if(isset($_POST['save6'])){
                       $f=$_POST['sc'];
                       mysqli_query($conn, "UPDATE `tblcompany` SET `s_s_content`='$f'");
                       ?>
        <script>
			window.alert('Successfully modified!');
		</script>
                   <?php } ?>
           
           
           
           
           <?php
                   if(isset($_POST['save7'])){
                       $f=$_POST['sf'];
                       mysqli_query($conn, "UPDATE `tblcompany` SET `s_f_content`='$f'");
                       ?>
        <script>
			window.alert('Successfully modified!');
		</script>
                   <?php } ?>
           
            </div>
    </div>


   
    </div>
      <div class="box-footer"></div>

  


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
        <i class="fa fa-bug"></i> For Thesis Purposes
    </div>
  <strong>Copyright &copy;<?php echo date("Y") ;?><a href="http://www.facebook.com/JM.JustinMarc"> Webmaster</a>.</strong> All rights reserved.
		</footer>
   </div> </div>
   
   
   
   
   
   
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.js"></script>
    <script src="../dist/js/demo.js"></script>
   
    <?php } ?>
  </body>
  </html>
