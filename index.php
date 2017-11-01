<?php 
session_start();
require 'includes/connect.php';
include 'includes/header.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Justin Marc T. Almario justin86marc@yahoo.com">
	<title>CARD SME | Homepage </title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<style type="text/css">
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
		.carousel-inner img {
			width: 100%;
			margin: auto;
		}
		.carousel-caption h3 {
			color: #fff !important;
		}
		@media (max-width: 600px) {
			.carousel-caption {
				display: none; 
			}
		}
		.carousel .item {
			height: 575px;
		}
		.item img {
			position: absolute;
			top: 0;
			left: 0;
			min-height: 575px;
		}
		footer {
			background-color: #2d2d30;
			color: #f5f5f5;
			padding: 32px;
		}
		footer a {
			color: #f5f5f5;
		}
		footer a:hover {
			color: #777;
			text-decoration: none;
		}
		.grey{
			background-color: rgb(236,236,236);
		}
		#services{
			padding-bottom: 50px;
		}
		#event1{
			padding-top: 50px;
			padding-bottom: 50px;
		}
		#event2{
			padding-top: 50px;
			padding-bottom: 50px;
		}
		#contact1{
			padding-top: 50px;
			padding-bottom: 50px;
		}
		div.polaroid {
			width: 100%;
			background-color: white;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			margin-bottom: 25px;
		}
		div.container-text {
			text-align: left;
			padding: 10px 20px;
		}
		#polaroid-img{
			width: 250px;
			height: 300px;
		}
		.navbar-brand{
            padding-top: 0px;
            padding-bottom: 0px;
            padding-left: 150px;
            width: 0 auto;
            position: center;
            
		}
        nav.navbar-findcond { background: #fff; border-color: #ccc; box-shadow: 0 0 2px 0 #ccc; }
    nav.navbar-findcond a { color: #217616; }
    nav.navbar-findcond ul.navbar-nav a { color: #217616; border-style: solid; border-width: 0 0 2px 0; border-color: #fff; }
    nav.navbar-findcond ul.navbar-nav a:hover,
    nav.navbar-findcond ul.navbar-nav a:visited,
    nav.navbar-findcond ul.navbar-nav a:focus,
    nav.navbar-findcond ul.navbar-nav a:active { background: #fff; }
    nav.navbar-findcond ul.navbar-nav a:hover { border-color: #217616; }
    nav.navbar-findcond li.divider { background: #ccc; }
    nav.navbar-findcond button.navbar-toggle { background: #a3ef74; border-radius: 2px; }
    nav.navbar-findcond button.navbar-toggle:hover { background: #a3ef74; }
    nav.navbar-findcond button.navbar-toggle > span.icon-bar { background: #fff; }
    nav.navbar-findcond ul.dropdown-menu { border: 0; background: #fff; border-radius: 4px; margin: 4px 0; box-shadow: 0 0 4px 0 #ccc; }
    nav.navbar-findcond ul.dropdown-menu > li > a { color: #444; }
    nav.navbar-findcond ul.dropdown-menu > li > a:hover { background: #217616; color: #fff; }
    nav.navbar-findcond span.badge { background: #217616; font-weight: normal; font-size: 11px; margin: 0 4px; }
    nav.navbar-findcond span.badge.new { background: rgba(0, 255, 0, 0.8); color: #fff; }
        nav.navbar-findcond form-group { font-size: 11px; }
	
	</style>
        
        <style>
    input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
} 
.modal-title {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
        }
    
    .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}
    .btn-login {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.btn-login:hover {
    opacity: 0.8;
}
    .psw{  
    float: right;
}
            .lclick{
                text-decoration: none;
                color: Black;
            }
            .lclick:hover{
                text-decoration: none;
                color: white;
            }
    </style>
    
	<link rel="icon" 
href="images/cardsmebank.PNG">
</head>
<body>
	<div id="myPage"></div>
	<nav class="navbar navbar-findcond navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                
			</div>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav navbar-middle">
					<li ><a href="#myPage">Home <span class="sr-only">(current)</span></a></li>
                    
					<li><a href="#services">SME Loan <span class="sr-only">(current)</span></a></li>
                    
					<li ><a href="#event1">Events <span class="sr-only">(current)</span></a></li>
                    
					
                    <li ><a href="#contact1">Contact Us <span class="sr-only">(current)</span></a></li>
                </ul>
                <a href="index.php">
                    <img class="navbar-brand" title="CARD SME Bank, Inc." rel="home" src=images/cardsmebank_logo.PNG title="company logo"></a>
                
                <ul class="nav navbar-nav navbar-right">
                    
                    <?php 
					if(isset($_SESSION['ses_user'])){
						echo "<li class='dropdown'>
						<a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>".$_SESSION['username']." <span class='caret'></span></a>
						<ul class='dropdown-menu' role='menu'>";
                        if($_SESSION['typ'] == 1){
                             echo "<li><a href='myloan.php'>My Loan</a></li>";
				             echo "<li><a href='logout.php'>Logout</a></li>";
                        }else{
                             
                             echo "<li><a href='sme-admin/profile.php'>Company Profile</a></li>";
				             echo "<li><a href='logout.php'>Logout</a></li>";
                        }
                            echo "</ul>";
							echo "</li>";
                   } else {
                        
				        echo "<li><a href='#' data-toggle='modal' data-target='#myModal'>Login</a></li>";
                        echo "<li><a href='reg.php'>Register</a></li>";
						}
					
                    ?>     
                </ul>
                        
			</div>
		</nav>
        <div class="modal" id="myModal" tabindex="-1" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header-success">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="imgcontainer">
                        <img src="images/cardsmebank.png" alt="Avatar" class="avatar">
                        </div>
                        <h4 class="modal-title" id="myModalLabel">CARD SME - Molino Branch</h4>
                        </div>
                        <div class="modal-body">        
                        <form action="login.php" method="POST">
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="user" required>
                        <label><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="pass" required></br>
                        <input type="checkbox" checked="checked"> Remember me
                        <span class="psw">Forgot <a href="#" data-toggle='modal' data-target='#fpModal'>password?</a></span>
                        <div class="modal-footer">
                        <input type="submit" class="btn-login" value="Login" name="submit" />
                        </div>
                        </form>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div id="erModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-header-success">
                        <h4 class="modal-title" id="myModalLabel"> Invalid Username or Password !</h4>
                        </div>
                        </div>
                        </div>
                         <div id="fpModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header-success">
                        <h4 class="modal-title" id="myModalLabel">Attention!</h4>
                        </div>
                        <div class="modal-body">
                        <label class="modal-title" id="myModalLabel">Sorry to say if you forgot your password</label>
                        <p><b>Go To the Card Sme Bank - Molino Branch<i> Personally</b></i>
                        To reset your password</p>
                        </div>
                        <div class="modal-footer">
                    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Aww,Ok </button>
                        </div>
                        </div>
                        </div>
                        </div>
                        

                          <div id="edModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header-success">
                        <h4 class="modal-title" id="myModalLabel">Attention!</h4>
                        </div>
                        <div class="modal-body">
                        <label class="modal-title" id="myModalLabel">Educational Loan is not yet available this momment</label>
                        
                        </div>
                        <div class="modal-footer">
                    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Aww,Ok </button>
                        </div>
                        </div>
                        </div>
                        </div>
                        
                         <div id="upgModal" class="modal fade box-success" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header-success">
                        <h4 class="modal-title" id="myModalLabel">Attention!</h4>
                        </div>
                        <div class="modal-body">
                            <label class="modal-title" id="myModalLabel">Need <b>Atleast</b> <i>Silver Level</i> of account to access this type of loan</label>
                        </div>
                        <div class="modal-footer">
                    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Aww,Ok </button>
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        
                      
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img  src="images/asd.jpg" width="1200" height="450px">
					<div class="carousel-caption">
						<h2 style="text-shadow: 2px 2px 4px #000000;">CARD SME BANK</h2>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="images/zxc.jpg"  width="1200" height="450px">
					<div class="carousel-caption">
						<h2 style="text-shadow: 2px 2px 4px #000000;">CARD SME BANK</h2>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive" src="images/gf.jpg" >
					<div class="carousel-caption">
						<h2 style="text-shadow: 2px 2px 4px #000000;">CARD SME BANK</h2>
					</div>
				</div>
			</div>
		</div>
		
		<section id="services" class="content-1-5 content-block">
			<div class="container-fluid" style="background-image: url(images/gren.png);">
				<h1 class="text-center polaroid" style="color: white;
				text-shadow: 2px 2px 4px #000000; margin-top: 50px">SME LOANS</h1>
				<div class="container">
					<div class="row">
                                           <a class="lclick"  <?php 
					if(isset($_SESSION['ses_user'])){
                        if($_SESSION['typ']==1){
                            echo " href='personalloan.php'/>";
                        }else{ echo "href='sme-admin/profile.php'/>";
                             }
                   } else {
                        echo " href='register.php'/>";
                    } ?>
						<div class="col-md-4">
							<div class="polaroid">
								<img src="images/pl.png" alt="img2" style="width:100%" id="polaroid-img">
								<div class="container-text">
									<h4>Personal Loan </h4><br>
									<p></p>
								</div>
							</div>
                </div>
                </a> 
                
					   <a class="lclick"  <?php 
					if(isset($_SESSION['ses_user'])){
                        if($_SESSION['typ']==1){
                            echo " href='#' data-toggle='modal' data-target='#edModal'>";
                        }else{ echo " href='sme-admin/profile.php'/>";
                             }
                   } else {
                          echo "href='#' data-toggle='modal' data-target='#edModal'/>";
                    } ?>
						<div class="col-md-4">
							<div class="polaroid">
                                 <img src="images/edu.png" alt="img1" style="width:100%" id="polaroid-img">
								<div class="container-text">
									<h4>Education Loan</h4><br>
									<p >The OL-Educational Loan is a product that intends to assist those members who have school age children but needs financial assistance to send them to school</p>
								</div>
							</div>
                    </div>
                </a> 

                        

						   <a class="lclick"  <?php 
					if(isset($_SESSION['ses_user'])){
                        if($_SESSION['typ']==1){
                    if($_SESSION['lvl'] >=2 ){
                                echo "href='smallbusinessloan.php'/>"; 
                           
                         }else{   echo " href='#' data-toggle='modal' data-target='#upgModal'>";
                             }
                                                   }else{ echo " href='sme-admin/profile.php'/>";
                             }
                   } else {
                        echo "<a href='register.php'/>";
                    } ?>
						<div class="col-md-4">
							<div class="polaroid">
								<img src="images/sb.png" alt="img3" style="width:100%" id="polaroid-img">
								<div class="container-text">
									<h4>Small-Scale Business</h4><br>
									<p></p>
								</div>
							</div>
						</div>
						</a> 
					</div>
				</div>
		</section>
		
		
		
			<?php
						$x=mysqli_query($conn,"SELECT * FROM `tblcompany`");
						$z=mysqli_fetch_array($x);
					?>
		
		
		
		
		<section id="event1" class="content-1-5 content-block">
			<div class="container grey">
				<h1 class="text-left"><?php echo $z['title']; ?></h1>
				<div class="row">
					<div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-12 pull-right">
						<div class="editContent">
							<h1><?php echo $z['m_content']; ?></h1>
						</div>
						<div class="editContent">
							<p class="lead"> <?php echo $z['s_content']; ?></p>
						</div>
						<div class="editContent">
							<p><?php echo $z['f_content']; ?></p>
						</div>
					</div>
					<div class="col-lg-5 col-md-6 col-sm-12 pull-left">
						<img class="img-responsive" src="images/iba.jpg">
					</div>
				</div>
			</div>
		</section>
		<section id="event2" class="content-block content-1-2">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="editContent">
							<h2><?php echo $z['s_title']; ?></h2>
						</div>
						<div class="editContent">
							<p class="lead"><?php echo $z['s_s_content']; ?></p>
						</div>
						<div class="editContent">
							<p><?php echo $z['s_f_content']; ?></p>
						</div>
					</div>
					<div class="col-sm-5 col-sm-offset-1">
						<img class="img-rounded img-responsive" src="images/a.jpg">
					</div>
				</div>
			</div>
		</section>
		<div class="item contact padding-top-0 padding-bottom-0 grey" id="contact1">
			<div class="wrapper grey">
				<div class="container">
					<div class="col-md-6 col-md-offset-1">
						<div class="editContent">
							<h2>Contact Us:</h2>
							<p class="text-light margin-bottom-40">
								Are your funds tied-up in your receivables? Or do you need additional stocks for the peak season? Feel free to Contact Us.
							</p>
						</div>
						<p>
							<b class="chead"><span class="fa fa-map-marker"></span>ADDRESS</b><br>
							<span class="editContent">
								South Susana Homes<br>
								Molino II<br>
								City of Bacoor<br>
							</span>
						</p>
						<p>
							<b class="chead"><span class="fa fa-phone"></span> PHONE</b><br>
							<span class="editContent">(042) 123 4567</span>
						</p>
						<p>
							<b class="chead"><span class="fa fa-envelope"></span> EMAIL</b><br>
							<a href="#" class="editContent">Cardsmebank@email.com</a>
						</p>
					</div>
					<div class="col-md-5">
						<h3 class="margin-bottom-40 editContent">Send us your suggestions</h3>
						<form method="POST" action="sendmessage.php">
							<div class="form-group">
								<input  minlength=10 type="text" required="" class="form-control input-md" id="name" name="namae"  pattern="[a-zA-Z\s]{1,}" placeholder="Your Full Name *">
							</div>
							<div class="form-group">
								<input  minlength=10 type="email" required="" class="form-control input-md" id="email" name="email" placeholder="Your email address*">
							</div>
							<div class="form-group">
								<textarea maxlength="300" class="form-control" required="" rows="4" name="message" placeholder="Suggestions / inquiry..."></textarea>
							</div>
							<input type="submit" class="btn btn-success btn-md btn-wide pull-right" name="submit"></input>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--onkeypress='return event.charCode >= 48 && event.charCode <= 57'-->
           <?php
            include 'includes/footer.php';
            ?>
    		<script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip(); 
			})
			$(function() {
				$('a[href*="#"]:not([href="#"])').click(function() {
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						if (target.length) {
							$('html, body').animate({
								scrollTop: target.offset().top
							}, 1000);
							return false;
						}
					}
				});
			});
		</script>
	</body>
	</html>
