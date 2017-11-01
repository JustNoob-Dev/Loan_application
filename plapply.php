<?php
if(isset($_POST['apply'])){
if(!empty($_POST['loana']) && !empty($_POST['payment'])) {
    session_start();
    include 'includes/header.php';
    require 'includes/connect.php';
    $totalammount = $_POST['loana'];
    $top = $_POST['payment'];
    $name = $_SESSION['username'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $id = $_SESSION['aid'];
    $comadd = $address.", ".$city;
    
    $query=mysqli_query($conn,"SELECT * FROM tblloanapplication WHERE MID='".$id."'");
	$numrows=mysqli_num_rows($query);
	if($numrows==0){
    $sql="INSERT INTO `tblmember`(`AID`, `address`, `contact`) VALUES ('$id','$comadd','$contact')";
	$result = $conn->query($sql);      
    }
    else {
        echo "isa isang loan lng pre";
    }
   ?>

<!doctype html>
<html>
<head>
<script>
    function balik(){
  window.location.href = 'personalloan.php';
    
}
    
    </script>
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
     h5 ,h4, h1, h3, p{
        text-align: center;
    }

.main 
 	margin:50px 15px;
}
 .ccontainer{

  width: 100%;
  padding: 10px;
  position: auto;
  z-index: 9999;
margin:100px 20px;
  margin-left: 20px;
  margin-right: 20px;
    }
    
</style>
<title>Loan Application</title>
<link rel="icon" 
href="images/cardsmebank.PNG">
</head>
<body>
   
<div class="ccontainer">
    <div class="row">
        <section>
            <div class="wizard">
            </br>
      <h1>Personal Loan</h1>
                
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="disabled">
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
                        <li role="presentation" class="active">
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
                
                <script>
    function computeLoan(){
        
        //kinuha ko yung value ng mga na input 
        var amount = document.getElementById('amount').value;
        var interest_rate = document.getElementById('interest_rate').value;
        var months = document.getElementById('months').value;
    
        // dito ko nag compute ng interest // interest * .01 nag momove lng ng decimal yan para makuha NUMERIC PERCENTAGE
        var interest = (amount * (interest_rate * .01)) / months;

        
        // calculate monthly payment //tofixed para 2 decimal point lng cya
        var payment = ((amount / months ) + interest ).toFixed(2);
        var inte = amount * interest_rate * .01; 
        var tpay = (amount /1 + inte).toFixed(2);
        //MONEY FORMAT !! NAKITA KO LNG SA NET GINAGAW lng NETO NAGLALAGAY NG COMA BAWAT 3DIGITS un lng
         document.getElementById('payment1').value = payment;
       document.getElementById('tpay1').value = tpay;
        payment = payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        tpay = tpay.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        document.getElementById('inte').innerHTML = interest_rate+"%";
        document.getElementById('intep').innerHTML = "₱"+interest;
        document.getElementById('payment').innerHTML = "₱"+payment;
        document.getElementById('tpay').innerHTML = "₱"+tpay;
       
        

    }
    </script>
    
    
<!--<script>    wag munang subukan masasaktan k lng ajax pa ahahahahh
            $('#apply3').click(function (e){
                var lamount = $('#amount').val()
                var payment = $('#payment').val()
                var interate = $('#interest_rate').val();
                var tpay = $('tpay').val();         
                $.ajax({
                    data:{
                    'tpay':tpay,
                       datatype:'JSON',
                        url:'plapply.php',
                        type: 'POST',
                        success: function(data){
                            success('<b>testing</b>');
                        },
                        error: function(data){
                        console.log(data);
                        arlert('ayos mukha');
                        return false;
                        }
                    }
                    
                });
             
            });
            
            </script>-->
            
            
<form role="form" method="POST" action="plapply2.php">
                    <div class="tab-content">
<div class="tab-pane active" role="tabpanel" id="step1">
       <h3>Step three</h3>
<p>Choose desired Payment and Review the following</p>
                                                

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2">Loaner</th>
                                                                    <?php 
                                                                    if($_POST['payment']=="daily"){
                                                                        echo ' <th>Days</th>';
                                                                    }else{
                                                                        echo ' <th>Monthly</th>';
                                                                    }
                                                                    ?>  
                                                                    <input type="text" name="loan_typ" value="<?php echo $_POST['payment']?>" hidden >
                                                            
                                                                    <th colspan="2">Loan Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <?php
                                                                        echo $name;
                                                                        ?>
                                                                    </td>
                                                                    
                                                                    <?php
                                                                  $level =$_SESSION['lvl'];
        if($level == 1){
            
            
        }
                                                                    
                                                                    
                                                                    ?>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    <td>
                                                                        <p>User Level &nbsp; <span class="text-info">Begineer</span></p>
                                                                      <!--  <p>Write something about yourself :p </p>-->
                                                                    </td>
                                                                    <td>
                                                                        <?php 
                                                                    if($_POST['payment']=="daily"){
                                                                        
                                                                        echo '<input name="typ_pay" min="1" id="months" type="number" class="form-control" onchange="computeLoan()" placeholder=" --Input No. Days--">';
                                                                    }else{
                                                                        echo '<input name="typ_pay" min="1" id="months" type="number"  class="form-control" onchange="computeLoan()" placeholder="--Enter Number of Months--">';
                                                                    }
                                                                    ?>  
                                                                    </td>
                                                                    <!--<td>₱12.00</td>
                                                                    <td>₱0.00</td>-->
                                                                    <td><?php echo "₱ "." $totalammount"; ?>
                                                                    </td>
                                                                  <!--  <td><a href="#"><i class="fa fa-trash-o"></i></a>-->
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                            <tfoot>
                                                          <!--      <tr>-->
                                                                   <!-- <th colspan="6">Loan Ammount</th>-->
                                                                    <!--<th colspan="2">--><input hidden onchange="computeLoan()" id="amount" type="number" name="loan_amount" value="<?php echo "$totalammount";?>" /><!--</th>-->
                                                             <!--   </tr>-->
            <tr>
                                                                    <th colspan="5">Interest Rate.                                                                     <?php 
    
    $sql=mysqli_query($conn,"SELECT * FROM `tblinterest` ORDER BY `tblinterest`.`IID` DESC LIMIT 1");
                        // fetch yung data sa db
						while ($row = mysqli_fetch_assoc($sql)) {

                            $int = $row['loan_interest'];
                           
                                                                   echo "(".$int;
                            echo '%';
                             echo ")";  
                            echo "</th>";
                     echo "<th colspan='2'>";
                                                          
                     echo   "<input hidden type='number' id='interest_rate' name='interest' onkeypress='return alpha(event,numbers)'  value=".$int." placeholder=".$int."%/>";   } ?>
                                                                        <p id="inte"></p>
                            </th>
                                                                </tr>
                                                               <tr>
                                                                    <th colspan="5">Interest Rate per payment.                                                         
                                                                        <th colspan="2"><p id="intep"></p></th>
                            </th>
                                                                </tr>
                     <input hidden type="text" name="total_amount_perpay" id="payment1" />
                                                                <tr>
                                                                    <th colspan="5">Total Amount Per payment </th>
                                                                    <th colspan="2"><p id="payment"></p></th>
                                                                </tr> 
                         <tr>
                                                                    <th colspan="5">Total</th>
                                                                    <th colspan="2"><p id="tpay"></p></th>
                                                                </tr>
                            <input hidden type="text" id="tpay1" name="tpay" id="payment1" />   
                                                            </tfoot>
                                                        </table>

                                                    </div>
                                       
                   <ul class="list-inline pull-right">
                   
        <li><button type="button" class="btn btn-default" onClick="balik();">Cancel</button></li>
        <li><button type="button" id="apply" name="apply3" class="btn btn-primary next-step">next</button></li>
    </ul>
                </div>
    </form>
                           
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
                                        <h4>Daily Payment</h4>
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
        <li><button type="button" class="btn btn-default prev-step" onClick="balik();">Cancel</button></li>
        <li><button type="submit" name="apply2" class="btn btn-primary">Apply</button></li>
    </ul>
</div>
                              
                        
<div class="tab-pane" role="tabpanel" id="step3">
<h3>Step three</h3>

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

         <div id="wlModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Missing Credentials!!</h4>
                        </div>
                        <div class="modal-body">
                        <label>Check all the input fields</label> 
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
        window.location.href = "personalloan.php";
    }
</script>

</body>
 <?php } else { echo
    
    
     "<script>
    $('#wlModal').modal('show');
    </script>";
                 echo "Required All Input Fields";
}
   

    
}


?>
</html>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
