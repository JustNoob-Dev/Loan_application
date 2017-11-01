<?php 
session_start();
include 'includes/header.php';
/*pag meron session yung user d kana makakapag register pero pag wala pwede nmn boi */
if(isset($_SESSION['ses_user'])){
    header("location: index.php");
}else{
    
?>
<!doctype html>
<html>
<head>
<style>
    
    #playground-container {
    height: 500px;
    overflow: hidden !important;
    -webkit-overflow-scrolling: touch;
}
body, html{
     height: 100%;
 	background-repeat: no-repeat;
 	background:url(images/absgreen.jpg);
 	font-family: 'Oxygen', sans-serif;
    background-size: cover;
}

.main{
 	margin:50px 15px;
}

h1.title { 
	font-size: 50px;
	font-family: 'Passion One', cursive; 
	font-weight: 400; 
}

hr{
	width: 10%;
	color: #fff;
}
a, u {
    text-decoration: none !important;
    
}
.form-group{
	margin-bottom: 15px;
}

label{
	margin-bottom: 15px;
}

input,
input::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}
#gender {
    font-size: 11px;
    padding-top: 3px;
}
    #date{
         font-size: 11px;
    padding-top: 3px;
    }
.main-login{
 	background-color: #fff;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}
.form-control {
    height: auto!important;
padding: 8px 12px !important;
}
.input-group {
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
}
#button {
    border: 1px solid #ccc;
    margin-top: 28px;
    padding: 6px 12px;
    color: #666;
    text-shadow: 0 1px #fff;
    cursor: pointer;
    -moz-border-radius: 3px 3px;
    -webkit-border-radius: 3px 3px;
    border-radius: 3px 3px;
    -moz-box-shadow: 0 1px #fff inset, 0 1px #ddd;
    -webkit-box-shadow: 0 1px #fff inset, 0 1px #ddd;
    box-shadow: 0 1px #fff inset, 0 1px #ddd;
    background: #f5f5f5;
    background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));
    background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
}
.main-center{
 	margin-top: 30px;
 	margin: 0 auto;
 	max-width: 400px;
    padding: 10px 40px;
	background:#1ab438;
	    color: #FFF;
    text-shadow: none;
	-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

}
span.input-group-addon i {
    color: #14902c;
    font-size: 17px;
}

.login-button{
	margin-top: 5px;
}

.login-register{
	font-size: 11px;
	text-align: center;
}
</style>
<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #1de233;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;

}
    .gitna{
  position: absolute;
   top: 15%;
   left: 70%;
    }
    h5{
        text-align: center;
    }
</style>
<title>Registration</title>
<link rel="icon" 
href="images/cardsmebank.PNG">
</head>
<body onload="myFunction()" style="margin:0;">
        <div id="loader"></div>
     
      
         <div style="display:none;" id="myDiv" class="animate-bottom">
           <img src="images/cardsmebank.png" class="gitna" alt="company logo"/>

           <div class="container">
			<div class="row main">
				<div class="main-login main-center">
            <h5>Sign up once and be a part of <b>Card SME Bank - Molino Branch</b></h5>
                    <form class="" method="post" action="">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-universal-access" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  onkeypress="return alpha(event,letters)" required placeholder="First Name"/>
									<span class="input-group-addon"></span>
									<input type="text" class="form-control" name="mname" id="mname"  onkeypress="return alpha(event,letters)" required maxlength="2" placeholder="Middle Name"/>
								</div>
							</div>
							<div class="cols-sm-4">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control"  onkeypress="return alpha(event,letters)" required name="lname" id="name"  placeholder="Surname"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>
                                                    <div class="form-group">
                                                    <label for="gender" class="cols-sm-2 control-label" >Gender</label>
                                                    <div class="cols-sm-10">
                                                    <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-venus-mars" aria-hidden="true"></i></span>
                                                    <Select name="gender" required type="text" class="form-control" id="gender">
                                                    <option> --- Select Gender ---</option>
                                                    <option value="Male" >Male</option>
                                                    <option value="Female" >Female</option>
                                                    </select>
                                                    </div>
                                                     </div>
                                                    </div>

      <div class="form-group">
    <label for="bday" class="cols-sm-2 control-label">Date of Birth</label>
      <div class="cols-sm-4">
      <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-table" aria-hidden="true"></i></span>
      <input type="date" class="form-control" name="bday" id="date" required placeholder="Date of Birth">
       </div>
          </div>
                        </div>



						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" required class="form-control" name="user" id="username" onkeypress="return alpha(event,letters)" placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" required class="form-control" name="pass" id="password" onkeypress="return alpha(event,numbers+letters)" placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" required class="form-control" name="repass" id="confirm" onkeypress="return alpha(event,numbers+letters)"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
						<input type="submit" value="Register" class="btn btn-primary btn-lg btn-block login-button" name="submit" />
						<!--target="_blank" parpa sa nxt page bubukas lagay mo lng yan--> 
							<a href="index.php" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Home</a>
						</div>
						
					</form>  
                </div></div></div>
                             <footer class="text-center">
			<strong>Copyright &copy;<?php echo date("Y") ;?><a href="http://www.facebook.com/JM.JustinMarc"> Webmaster</a>.</strong> All rights reserved. <i class="fa fa-bug"></i> For Thesis Purposes
		</footer>
                           
                           </div>
                            
                                      
                        <div id="scModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Account Successfully Created !!</h4>
                        </div>
                        <div class="modal-body">
                        <label>Congrats, <?=$_POST['user'];?>! you created a <i>BASIC</i> level account of Card SME - Molino Branch </label> 
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-success" OnClick="done()" name="done">Done</button>
                        </div>
                        </div>
                        </div>
                        </div>
<!--onlcick na script baka makalimutan mo pa!  yan try ko lng dito alam mo ba ginagawa ng script n yan ? riderection lng ano bayan d palam-->                  

                       
                       <script>
    function done() {
        window.location.href = "myloan.php";
    }
</script>
                        
                        
                        <div id="ercModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
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
                        
                        <div id="urcModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Error Alert!</h4>
                        </div>
                        <div class="modal-body">
                        <label class="modal-title" id="myModalLabel">Username already exists!</label>
                        <p>To User: Can you Please </p>
                        <div class="imgcontainer">
                        <img src="images/useit.png" alt="Avatar" class="avatar">
                        </div>
                        <p><i>And think of other username!</i></p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">I dont have a brain</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok i`ll try</button>
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        <div id="uxModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Error Alert!</h4>
                        </div>
                        <div class="modal-body">
                        <label class="modal-title" id="myModalLabel">Username must not exceed 16 characters</label>
                        <p><b>To User:</b> <i>Can you Please</i></p>
                        <div class="imgcontainer">
                        <img src="images/useit.png" alt="Avatar" class="avatar">
                        </div>
                        <p><i>And think on how to shortent your Username!</i></p>
                        </div>
                        <div class="modal-footer">
                         <button type="button" class="btn btn-warning" data-dismiss="modal">I dont have a brain</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok i`ll try</button>
                        </div>
                        </div>
                        </div>
                        </div>
                        
                         <div id="pxModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Error Alert!</h4>
                        </div>
                        <div class="modal-body">
                        <label class="modal-title" id="myModalLabel">Password must not exceed 16 characters</label>
                        <p><b>To User:</b> <i>Can you Please</i></p>
                        <div class="imgcontainer">
                        <img src="images/useit.png" alt="Avatar" class="avatar">
                        </div>
                        <p><i>And think on how to <b>shortent</b> your Password!</i></p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">I dont have a brain</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok i`ll try</button>
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        <div id="pmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Error Alert!</h4>
                        </div>
                        <div class="modal-body">
                        <label class="modal-title" id="myModalLabel">Password does not match!</label>
                        <p>To User: Can you Please </p>
                        <div class="imgcontainer">
                        <img src="images/useit.png" alt="Avatar" class="avatar">
                        </div>
                        <p><i>And input the <b>same</b> password!</i></p>
                        </div>
                        <div class="modal-footer">
                         <button type="button" class="btn btn-warning" data-dismiss="modal">I dont have a brain</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok i`ll try</button>
                        </div>
                        </div>
                        </div>
                        </div>
                        
                         <div id="arModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Error Alert!</h4>
                        </div>
                        <div class="modal-body">
                        <label class="modal-title" id="myModalLabel">All Fields Required!</label>
                        <p>To User: Can you Please </p>
                        <div class="imgcontainer">
                        <img src="images/useit.png" alt="Avatar" class="avatar">
                        </div>
                        <p><i>And Fill in the blanks</i></p>
                        </div>
                        <div class="modal-footer">
                         <button type="button" class="btn btn-warning" data-dismiss="modal">I dont have a brain</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok i`ll try</button>
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        <div id="grModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Error Alert!</h4>
                        </div>
                        <div class="modal-body">
                        <label class="modal-title" id="myModalLabel">Choose Gender!</label>
                        <p>To User: Can you Please </p>
                        <div class="imgcontainer">
                        <img src="images/useit.png" alt="Avatar" class="avatar">
                        </div>
                        <p><i>And Fill in the blanks</i></p>
                        </div>
                        <div class="modal-footer">
                         <button type="button" class="btn btn-warning" data-dismiss="modal">I dont have a brain</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok i`ll try</button>
                        </div>
                        </div>
                        </div>
                        </div>
                      
                      

    
<?php
if(isset($_POST["submit"])){
include 'includes/connect.php';
if(!empty($_POST['user']) && !empty($_POST['pass'])) {
    $fname=$conn->escape_string($_POST['name']);
    $mname=$conn->escape_string($_POST['mname']);
    $lname=$conn->escape_string($_POST['lname']);
    $email=$conn->escape_string($_POST['email']);
    $gender=$conn->escape_string($_POST['gender']);
    $bday=$conn->escape_string($_POST['bday']);
	$user=$conn->escape_string($_POST['user']);
	$pass=$conn->escape_string($_POST['pass']);
    $repass=$conn->escape_string($_POST['repass']);
    $date = date("Y-m-d");
    
if(strlen($pass) < 16 ){
if(strlen($user) < 16 ){
if(strlen($gender) <= 6 ){
if ($pass==$repass){
    
    $pass= md5($pass);
	$query=mysqli_query($conn,"SELECT * FROM tblaccounts WHERE username='".$user."' AND password='".$pass."'");
	$numrows=mysqli_num_rows($query);
	if($numrows==0)
	{
    $comadd="";
    $contact="";
    $sql="INSERT INTO `tblmember`(`address`, `contact`) VALUES ('$comadd','$contact')";
	$result = $conn->query($sql);  
    $sql="INSERT INTO `tblaccounts`(`username`, `password`, `fname`, `mname`, `lname`, `email`, `gender`, `bday`,`datecreated`) VALUES ('$user','$pass','$fname','$mname','$lname','$email','$gender','$bday','$date')";
	$result = $conn->query($sql);
    $fullname = $lname+","+$fname+$mname;
    $_SESSION['usrname']=$fullname;
    if($result){
	echo   
    "<script>
    $('#scModal').modal('show');
    </script>";
        
	} else {
	echo 
    "<script>
    $('#ercModal').modal('show');
    </script>";
	}
	} 
    else {
	echo  
    "<script>
    $('#urcModal').modal('show');
    </script>";
	}

}
    else {
    echo  "<script>
    $('#pmModal').modal('show');
    </script>";
    }
    }
    else{
            echo  "<script>
    $('#grModal').modal('show');
    </script>";
        
    }
}
    else {
        echo 
         "<script>
    $('#uxModal').modal('show');
    </script>";
} }  else {
        echo
     "<script>
    $('#pxModal').modal('show');
    </script>";

        
        

} }elseif (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			header("Location: reg.php?com=errorforname");
		}
		elseif (!preg_match("/^[a-zA-Z ]+$/",$mname)) {
			header("Location: reg.php?com=errorformiddlename");
		}
    elseif (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
			header("Location: reg.php?com=errorforlastname");
		}
		elseif (!preg_match("/^[a-zA-Z ]+$/",$username)) {
			header("Location: reg.php?com=errorforusername");
		}
}
    
?>
 <!--  pag show at hide para sa loadning 1000 para 1sec-->
<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>


</body>
<?php } ?>
</html>