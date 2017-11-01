<?php 
session_start();
include 'includes/header.php';
require 'includes/connect.php';

/*pag meron session yung user d kana makakapag register pero pag wala pwede nmn boi */
    
$query=mysqli_query($conn,"SELECT * FROM tblloanapplication WHERE MID='".$_SESSION['aid']."'");
	$numrows=mysqli_fetch_array($query);
 	$x = 'APPROVED';
    $y = 'PENDING';
	if (($numrows['status']==$x) || ($numrows['status']==$y)){
		?>
		<script>
			window.alert('You Have Existing Loan Application!');
			window.history.back();
		</script>
	<?php
    }
    if(!isset($_SESSION['ses_user'])){
    header("location: index.php");
}  
else{
    
?>
<!doctype html>
<html>
<head>
	<script src="js/allowkey.js"></script>
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
    h5 ,h4, h1, h3, p{
        text-align: center;
    }
</style>
<style>
    .wizard {
        margin: 20px auto;
        background: #fff;
    }
    
    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }
    
    .wizard>div.wizard-inner {
        position: relative;
    }
    
    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 80%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }
    
    .wizard .nav-tabs>li.active>a,
    .wizard .nav-tabs>li.active>a:hover,
    .wizard .nav-tabs>li.active>a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
    }
    
    span.round-tab {
        width: 70px;
        height: 70px;
        line-height: 70px;
        display: inline-block;
        border-radius: 100px;
        background: #fff;
        border: 2px solid #e0e0e0;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 25px;
    }
    
    span.round-tab i {
        color: #555555;
    }
    
    .wizard li.active span.round-tab {
        background: #fff;
        border: 2px solid #5bc0de;
    }
    
    .wizard li.active span.round-tab i {
        color: #5bc0de;
    }
    
    span.round-tab:hover {
        color: #333;
        border: 2px solid #333;
    }
    
    .wizard .nav-tabs>li {
        width: 25%;
    }
    
    .wizard li:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: #5bc0de;
        transition: 0.1s ease-in-out;
    }
    
    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 1;
        margin: 0 auto;
        bottom: 0px;
        border: 10px solid transparent;
        border-bottom-color: #5bc0de;
    }
    
    .wizard .nav-tabs>li a {
        width: 70px;
        height: 70px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
    }
    
    .wizard .nav-tabs>li a:hover {
        background: transparent;
    }
    
    .wizard .tab-pane {
        position: relative;
        padding-top: 50px;
    }
    
    .wizard h3 {
        margin-top: 0;
    }
    
    @media( max-width: 585px) {
        .wizard {
            width: 90%;
            height: auto !important;
        }
        span.round-tab {
            font-size: 16px;
            width: 50px;
            height: 50px;
            line-height: 50px;
        }
        .wizard .nav-tabs>li a {
            width: 50px;
            height: 50px;
            line-height: 50px;
        }
        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 35%;
        }
    }
    body, html{
    height: 100%;
 	background-repeat: no-repeat;
 	background:url(images/absgreen.jpg);
 	font-family: 'Oxygen', sans-serif;
    background-size: cover;
        
}

.main 
 	margin:50px 15px;
}
    .ccontainer{
  width: 100%;
  padding: 10px;
  position: fixed;
  left: 0;
  right: 0;
  z-index: 9999;
  margin-left: 20px;
  margin-right: 20px;
        backdrop-filter: blur(5px);
    }
    
</style>
<title>Loan Application</title>
<link rel="icon" 
href="images/cardsmebank.PNG">
</head>
<body onload="myFunction()" style="margin:0;">
        <div id="loader"></div>
     
      
         <div style="display:none;" id="myDiv" class="animate-bottom">

<div class="ccontainer">
    <div class="row">
        <section>
            <div class="wizard">
            </br>
      <h1>Personal Loan</h1>
                
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <span class="round-tab">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                <span class="round-tab">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                <span class="round-tab">
                                <i class="glyphicon glyphicon-check"></i>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>

<form role="form" method="POST" action="plapply.php">
                    <div class="tab-content">
<div class="tab-pane active" role="tabpanel" id="step1">
    <h3>Step one</h3>
    <p>Fill Up</p>
            <div id="content">
                <div class="container">

                    <div class="row">

                        <div class="col-md-9 clearfix">

                            <div class="box">
                                    
                                    
                                    
                                    <?php 
                                
                                
                                $a=mysqli_query($conn,"SELECT * FROM tblaccounts LEFT JOIN tblloanapplication ON tblloanapplication.MID = tblaccounts.AID LEFT JOIN tblmember ON tblmember.AID = tblaccounts.AID WHERE tblaccounts.AID='".$_SESSION['aid']."'"); 
                                $x=mysqli_fetch_array($a); 
                                
                                
                                ?>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="content">
                                        <div class="row">
                                          
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="title">Enter Loan Ammount</label>
                                                
                                                    <input type="text" onkeypress="return alpha(event,numbers)"  min="100" step="100" class="form-control"  name="loana" id="loan amount" placeholder="<?php
                                                    if($x['account_lvl']==3){
                                                    echo "Enter Amount ₱50,000 below"; 
                                                    }elseif($x['account_lvl']==2){
                                                    echo "Enter Amount ₱10,000 below";
                                                    }else{
                                                    echo "Enter Amount ₱5,000 below";
                                                    }
                                                    ?>
                                                    " maxlength="5" >

                                                </div>
                                            </div>
                                         
                                        </div>
                                        <!-- /.row -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="firstname">Fullname</label>
                                                    <input type="text"  onkeypress="return alpha(event,letters)" class="form-control" id="firstname"
                                                     value="<?php echo $_SESSION['username'] ?>" name="fullname" disabled>
                                                </div>
                                            </div>
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="company">Email Address</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.row -->
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="street">Complete Home Address</label>
                                                    <input type="text" class="form-control" name="address" value="<?php echo $x['address']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="streetnr">Birthday</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['bd']; ?>" id="bday" disabled >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <div class="col-sm-6 col-md-2">
                                                <div class="form-group">
                                                    <label for="zip">Postal code</label>
                                                    <input type="text" class="form-control" id="zip" value=" 4102" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label for="city">city</label>
                                                    <input type="text" name="city" id="city" class="form-control" id="city" value="City of Baccor" disabled>
                                                        <input type="hidden" name="city" id="city" class="form-control" id="city" value="City of Baccor" hidden>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" class="form-control" id="country" value="Philippines" disabled>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="phone">Contact No</label>
                                                    <input type="text" onkeypress="return alpha(event,numbers)" class="form-control" id="phone" name="contact" maxlength="11" value="<?php echo $x['contact']; ?>">
                                                </div>
                                   
                                            </div>
                                       
                                   
                                        </div>
                                       
                              </div>

                               
                            </div>
                            <!-- /.box -->


                        </div>
                        <!-- /.col-md-9 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /#content -->
            <ul class="list-inline pull-right">
                <li><button type="button" id="bnxt1" class="btn btn-primary next-step">next</button></li>
            </ul>
</div>
                        
                           
<div class="tab-pane" role="tabpanel" id="step2">
    <h3>Step two</h3>
    <p>Mode of Payment</p>
    <div id="content">
     <div class="container">
        <div class="row">
            <div class="col-md-10 clearfix" id="checkout">
                <div class="box">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box payment-method">
                                        <h4>Daily</h4>
                                  <!--      <p>Pag ito ang pinili mo mag hihirap ka kc lagi ka mag babayad ng kung anoino basta wag ito hahaha.<br><br><br></p>-->
                                        <div class="box-footer text-center">
                                            <input type="radio" name="payment" value="daily">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>Monthly</h4>

                                       <!-- <p>Pag ito pinili mo yayaman ka dito PAWER!! payaman hahahahah .</p>-->

                                        <div class="box-footer text-center">
                                            <input type="radio" name="payment" value="monthly">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                        </div>
                        <!-- /.row -->
         </div>
            <!--   container-->
                </div>
                <!-- /.content -->
    <ul class="list-inline pull-right">
        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
        <li><button type="submit" name="apply" class="btn btn-primary">Next</button></li>
    </ul>
</div>
    </form>                           
                        
<div class="tab-pane" role="tabpanel" id="step3">
    <h3>Step three</h3>
    <p>Review</p>
                                                

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2">Loaner</th>
                                                                    <th>Mode of Payment</th>
                                                                    <th>kahit</th>
                                                                    <th>ano dito</th>
                                                                    <th colspan="2">Total Loan Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <?php
                                                                        echo $_SESSION['ses_user'];
                                                                        ?>
                                                                    </td>
                                                                    
                                                                    <?php
                                                                  $level =$_SESSION['lvl'];
        if($level == 1){
            
            
        }
                                                                    
                                                                    
                                                                    ?>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    <td>
                                                                        <p>User Level<span class="text-info">Begineer</span></p>
                                                                        <p>Write something about yourself :p </p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" value="2" class="form-control">
                                                                    </td>
                                                                    <td>₱12.00</td>
                                                                    <td>₱0.00</td>
                                                                    <td>₱24.00</td>
                                                                    <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="5">Loan Ammount</th>
                                                                    <th colspan="2">₱24.00</th>
                                                                </tr>
                                                                <?php 
    
    $sql=mysqli_query($conn,"SELECT * FROM `tblinterest` ORDER BY `tblinterest`.`IID` DESC LIMIT 1");
                        // fetch yung data sa db
						while ($row = mysqli_fetch_assoc($sql)) {
                                                               echo '<tr>
                                                                    <th colspan="5">Interest Rate. ('.$row['loan_interest'].'%)</th>
                                                                    <th colspan="2">₱4.56</th>
                                                                </tr>"';
                        }  ?>
                                                                <tr>
                                                                    <th colspan="5">Total Amount Per payment </th>
                                                                    <th colspan="2">₱2.50</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="5">Total</th>
                                                                    <th colspan="2">₱26.50</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>

                                                    </div>
                                       
                   <ul class="list-inline pull-right">
        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
        <li><button type="button" class="btn btn-primary next-step">next</button></li>
    </ul>
                </div>
                        
                        
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <h3>Complete steps</h3>
                            <p>You have successfully completed every steps.</p>
                            <p>Estimated time <b>48hours</b>Wait until the admin approve your laon application.</p>
                            <h3 class="dark-grey">Terms and Conditions</h3>
				<p>
					By clicking on "Apply" you agree to The Company's' Terms and Conditions
				</p>
				<p>
					While rare, prices are subject to change based on exchange rate fluctuations - 
					should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)
				</p>
				<p>
					Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)
				</p>
				<p>
					Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)
				</p>
         
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="submit" name="apply" class="btn btn-primary">Apply</button></li>
                          
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
            
            </div>
        </section>
    </div>
</div>
    </div>
    </div>
<script>
    $(document).ready(function() {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function(e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function(e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>
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