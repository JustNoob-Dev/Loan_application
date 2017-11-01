<?php
 session_start();
include 'includes/connect.php';
include 'includes/header.php';
include 'smenav.php';
if(!isset($_SESSION['ses_user'])){
    header("location: index.php");
}else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
 <legend><MARQUEE>UPGRADE YOUR ACCOUNT</MARQUEE></legend>
<div class="container"> <br />
    <div class="row">
<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Instruction</strong><small></small></div>
				<div class="panel-body">
					
				
 *Please provide a clear image(s) of any of the documents needed.</br>
*ID must show birthdate</br>
*ID must have at least one month before expiration</br>
*Please provide the latest Biling Statement for faster transaction</br>
   </br>
    
</div>
</div>
</div>
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Valid ID</strong> <small> </small></div>
        <div class="panel-body">
            <form action="" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file" required /></br>
                   <!-- </span>-->
           
                </div>
    
                <!-- /input-group image-preview [TO HERE]-->
          <!--      <br />-->
                <!-- Drop Zone -->
                <!--<div class="upload-drop-zone" id="drop-zone"> Or drag and drop files here </div>-->
        <?php

if(isset($_FILES['file']['tmp_name']) && isset($_FILES['file2']['tmp_name'])){

    if (!isset($_FILES['file']['tmp_name']) || !isset($_FILES['file2']['tmp_name'])){
                    echo "no image found";
    }
$x=$_SESSION['aid'];
$uploads_dir = 'mem_save/valid_id';
$uploads_dir2 = 'mem_save/bil_state';  
    $file_name = $_FILES['file']['name'];
    $file_name2 = $_FILES['file2']['name'];
          
$ID="$uploads_dir/$file_name";
$BIL="$uploads_dir2/$file_name2";
    
$sql = "UPDATE `tblmember` SET `mem_id` = '$ID', `billing_state` = '$BIL'  WHERE `tblmember`.`AID` = '$x'";
$result = $conn->query($sql);  
    if($result){
    if(move_uploaded_file($_FILES["file"]["tmp_name"],"$uploads_dir/$file_name")){
        if(move_uploaded_file($_FILES["file2"]["tmp_name"],"$uploads_dir2/$file_name2")){ 

         echo '<script language="javascript">';
		    echo 'alert("File Uploaded!"); location.href="upacnt_2.php"';
		    echo '</script>';   
            
            
    } } 
    }
    
else {

echo '<script type="text/javascript">',
    'alert("No Image Found!")';
    }
}
?>
        
  
        </div>
    </div>
</div>
<div class="col-md-4">
    <button id="next" onclick="home()" name="next" class="btn-large btn btn-default btn-lg">
       My Loan
       </button>
    <button type="submit" id ="save" name="save" class="btn-large btn btn-success btn-lg">
       Next
       </button>
   
</div>




<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Biling Statement</strong> <small> </small></div>
        <div class="panel-body">
          
                    <input type="file" name="file2" required /></br>
                   <!-- </span>-->
       
                </div>
     </form>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
    

     function home(){
      window.location.href = "myloan.php";
    }
 
</script>



<!--<script>
    
$(document).on('click', '#close-preview-2', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview-2',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
    
  
</script>
<script>
    
$(document).on('click', '#close-preview-2', function(){ 
    $('.image-preview-2').popover('hide');
    // Hover befor close the preview
    $('.image-preview-2').hover(
        function () {
           $('.image-preview-2').popover('show');
        }, 
         function () {
           $('.image-preview-2').popover('hide');
        }
    );    
});

$(function() {
  
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview-2',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");

    $('.image-preview-2').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
 
    $('.image-preview-clear-2').click(function(){
        $('.image-preview-2').attr("data-content","").popover('hide');
        $('.image-preview-filename-2').val("");
        $('.image-preview-clear-2').hide();
        $('.image-preview-input-2 input:file').val("");
        $(".image-preview-input-title-2").text("Browse"); 
    }); 

    $(".image-preview-input-2 input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
  
        reader.onload = function (e) {
            $(".image-preview-input-title-2").text("Change");
            $(".image-preview-clear-2").show();
            $(".image-preview-filename-2").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview-2").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
    
  
</script>-->
<!-- /container --> 
<?php } ?>
</body>
</html>