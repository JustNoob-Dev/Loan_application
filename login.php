<?php
session_start();
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
    require 'includes/connect.php';
	$user=$conn->escape_string($_POST['user']);
	$pass=$conn->escape_string($_POST['pass']);
    $pass= md5($pass);
	$query=mysqli_query($conn,"SELECT * FROM tblaccounts WHERE username='".$user."' AND password='".$pass."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysqli_fetch_assoc($query))
	{
    $name=$row['fname'];
    $mname=$row['mname'];
    $lname=$row['lname'];
    $_SESSION['aid'] = $row['AID'];
    $fullname = $lname.", ".$name." ".$mname.". ";
	$dbusername=$row['username'];
	$dbpassword=$row['password'];
    $_SESSION['username']=$fullname;
    $_SESSION['typ'] = $row['account_type'];
    $_SESSION['bd'] = $row['bday'];    
    $_SESSION['lvl'] = $row['account_lvl'];  
    $_SESSION['email'] = $row['email'];
	}
    
	if($user == $dbusername && $pass == $dbpassword) 
	{ /* pag 2 admin recta na sa company profile */
                if($_SESSION['typ']==2){
                    $_SESSION['ses_user']=$user; 
                    header("Location: sme-admin/profile.php");
                    }
        else{
    $_SESSION['ses_user']=$user;
	/* Redirect browser */
	header("Location: index.php");
        }

	}else{
            session_destroy();
    require_once 'index.php';
    header("Location: index.php?error=Username / Password mismatch!");
    /* pag error may lalabas na modal sht */
	echo 
    "<script>
    $('#erModal').modal('show');
    </script>";
    }
        
} 
else
    {
    session_destroy();
    require_once 'index.php';
    header("Location: index.php");
    /* pag error may lalabas na modal sht */
	echo 
    "<script>
    $('#erModal').modal('show');
    </script>";
   
	}

    }
    else
    {
	echo "All fields are required!";
}
}

?>
