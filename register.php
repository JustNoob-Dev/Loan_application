<?php 
header("location: reg.php");
?>
<!--

kaya nakaganto to kc may bago na ako ahahah


<!doctype html>
<html>
<head>
<title>Register</title>
<style>.modal-title {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
    
        }
    
    
    #link
    {
        text-decoration-style: none;
        color: white;
        text-decoration: none;
    }
  body.background {
  background: url(images/absgreen.jpg) repeat;
  border: 2px solid black;
  opacity: 0.6;
  filter: alpha(opacity=60);
}

div.transbox {
  margin: 30px;
  background-color: #ffffff;
 

}

div.transbox p {
  margin: 5%;
}
    </style>
</head>

<body class="background">

<center>    
<h3>Registration Form</h3>    
<form action="" method="POST">
<div class="transbox">
Username: <input type="text" name="user" required><br/>
Password: <input type="password" name="pass" required><br />	
Retype Password:<input type="password" name="repass" required><br />

<button type="button" class="btn btn-danger"><a id="link" href="index.php">Home</a></button>
<input type="submit" value="Register" class="btn btn-success" name="submit" />
</div>
</form>           
                        <div id="scModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Account Successfully Created !!</h4>
                        </div>
                        <div class="modal-body">
                        <label>Congrats, <!?=$_POST['user'];?>! you created a <i>BASIC</i> level account of Card SME - Molino Branch </label> 
                        <p><i>you can now upgrade your account by clicking the button below or go home by choosing done</i></p>  
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="upacnt()" name="done">Upgrade Account</button>
                        <button type="button" class="btn btn-default" onclick="done()" name="done">Done</button>
                        </div>
                        </div>
                        </div>
                        </div>
<!--onlcick na script baka makalimutan mo pa!  yan try ko lng dito               
<script>
    function upacnt() {
        window.location.href = "upacnt.php";
    }
</script>
                       
                       <script>
    function done() {
        window.location.href = "index.php";
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
                      
</center>
    
<!?php
if(isset($_POST["submit"])){
include 'includes/connect.php';
if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$conn->escape_string($_POST['user']);
	$pass=$conn->escape_string($_POST['pass']);
    $repass=$conn->escape_string($_POST['repass']);
    
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(strlen($pass) < 16 ){
if(strlen($user) < 16 ){
if ($pass==$repass){
    $pass= md5($pass);
	$query=mysqli_query($conn,"SELECT * FROM tblaccounts WHERE username='".$user."' AND password='".$pass."'");
	$numrows=mysqli_num_rows($query);
	if($numrows==0)
	{
	$sql="INSERT INTO tblaccounts(username,password,) VALUES('$user','$pass')";
	$result = $conn->query($sql);
    $_SESSION['ses_user']=$user;
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
}else 
    echo  "<script>
    $('#pmModal').modal('show');
    </script>";
    }
    else
        echo 
         "<script>
    $('#uxModal').modal('show');
    </script>";
}   else
        echo
     "<script>
    $('#pxModal').modal('show');
    </script>";

} else {
	echo "All fields are required!";
}
}
    
?>
</body>
    <center>
    <div id="footer">
        Copyright &copy; 2017<br/>
        All Rights Reserved.<br/>
        <!--Powered By <a href="mailto:justin86marc@yahoo.com">Justin Marc T. Almario</a>
    </div>
    </center>
</html>-->