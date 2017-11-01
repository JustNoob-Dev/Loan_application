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
      <h1>
       <small></small>
          <small></small>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
       <li class="active">Live Chat Support</li>
      </ol>
    </section>
    <section class="content">
      
    <!-- Construct the box with style you want. Here we are using box-danger -->
      <!-- Then add the class direct-chat and choose the direct-chat-* contexual class -->
      <!-- The contextual class should match the box, so we are using direct-chat-danger -->
      <div class="box box-success direct-chat direct-chat-success">
        <div class="box-header with-border">
          <h3 class="box-title">SME Chat support</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!-- In box-tools add this button if you intend to use the contacts pane -->
            <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
         
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages">
            <!-- Message. Default to the left -->
   <?php 
     $admin = 1;
     
                $s = "SELECT * FROM `tblchat` Order by `CID`";
						$result = $conn->query($s);
						while ($x = $result->fetch_assoc()) {	

                            
                      
       
			if($x['AID']==1){
                
                                

     ?>
           <!-- Message to the right -->
            <div class="direct-chat-msg right">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-right"><?php echo $x['fname']; ?></span>
                <span class="direct-chat-timestamp pull-left"><?php echo $x['chat_date']; ?></span>
              </div><!-- /.direct-chat-info -->
              <img class="direct-chat-img" src="../images/cardsmebank.png" alt="message user image"><!-- /.direct-chat-img -->
              <div class="direct-chat-text">
               <?php echo $x['message']; ?>
              </div><!-- /.direct-chat-text -->
            </div><!-- /.direct-chat-msg -->

    <?php 
                  }	    else{    
                   
              
              ?>
           
            
            
              <div class="direct-chat-msg">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left"><?php echo $x['fname']; ?></span>
                <span class="direct-chat-timestamp pull-right"><?php echo $x['chat_date']; ?></span>
              </div><!-- /.direct-chat-info -->
              <img class="direct-chat-img" src="../images/userprofile.jpg" alt="message user image"><!-- /.direct-chat-img -->
              <div class="direct-chat-text">
                  <?php echo $x['message']; ?>
              </div><!-- /.direct-chat-text -->
            </div><!-- /.direct-chat-msg -->
            
            
            
            <?php  }   }    ?>
          </div><!--/.direct-chat-messages-->

          <!-- Contacts are loaded here -->
  
          <div class="direct-chat-contacts">
            <ul class="contacts-list">
              <li>
                              <?php
					$pq=mysqli_query($conn,"SELECT * FROM tblaccounts WHERE account_type ='$admin' ");
     while($pqrow=mysqli_fetch_array($pq)){
                $name=$pqrow['fname'];
                        $mname=$pqrow['mname'];
                        $lname=$pqrow['lname'];
                        $fullname = $lname.", ".$name." ".$mname.". ";
        
        ?>
                <a href="#">
          
                  <img class="contacts-list-img" src="../images/userprofile.jpg" alt="Contact Avatar">
                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                      <?php echo $fullname; ?>
                      <small class="contacts-list-date pull-right"></small>
                    </span>
                    <span class="contacts-list-msg"></span>

                  </div><!-- /.contacts-list-info -->
                   
                </a>
                 <?php } ?>
              </li><!-- End Contact Item -->
              
            </ul><!-- /.contatcts-list -->
          </div><!-- /.direct-chat-pane -->
 
          
        </div><!-- /.box-body -->
        <div class="box-footer">

        	<form action="send.php" method="post" class="input-group" >
           <textarea class="form-control" placeholder="Type your message..." name="msg" id="typing"></textarea>
            <span class="input-group-btn">
             <button type="submit" name="submit" class="btn btn-success form-control">Send</button>
            </span>
              </form>
      
        </div><!-- /.box-footer-->
      </div><!--/.direct-chat -->
      
        
      
      
      
      
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
