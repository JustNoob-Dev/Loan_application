<!DOCTYPE html>
<?php
include 'includes/header.php';
include 'includes/connect.php';
?>
<head>
   
    <style>
        
        
    .chatbox {
    position: fixed;
    bottom: 0;
    right: 30px;
    width: 300px;
    height: 400px;
    background-color: #fff;
    font-family: 'Lato', sans-serif;

    -webkit-transition: all 600ms cubic-bezier(0.19, 1, 0.22, 1);
    transition: all 600ms cubic-bezier(0.19, 1, 0.22, 1);

    display: -webkit-flex;
    display: flex;

    -webkit-flex-direction: column;
    flex-direction: column;
}

.chatbox--tray {
    bottom: -350px;
}

.chatbox--closed {
    bottom: -400px;
}

.chatbox .form-control:focus {
    border-color: #1f2836;
}

.chatbox__title,
.chatbox__body {
    border-bottom: none;
}

.chatbox__title {
    min-height: 50px;
    padding-right: 10px;
    background-color: rgb(9, 147, 20);
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    cursor: pointer;

    display: -webkit-flex;
    display: flex;

    -webkit-align-items: center;
    align-items: center;
}

.chatbox__title h5 {
    height: 50px;
    margin: 0 0 0 15px;
    line-height: 50px;
    position: relative;
    padding-left: 20px;

    -webkit-flex-grow: 1;
    flex-grow: 1;
}

.chatbox__title h5 a {
    color: #fff;
    max-width: 195px;
    display: inline-block;
    text-decoration: none;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.chatbox__title h5:before {
    content: '';
    display: block;
    position: absolute;
    top: 50%;
    left: 0;
    width: 12px;
    height: 12px;
    background: #4CAF50;
    border-radius: 6px;

    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}

.chatbox__title__tray,
.chatbox__title__close {
    width: 24px;
    height: 24px;
    outline: 0;
    border: none;
    background-color: transparent;
    opacity: 0.5;
    cursor: pointer;

    -webkit-transition: opacity 200ms;
    transition: opacity 200ms;
}

.chatbox__title__tray:hover,
.chatbox__title__close:hover {
    opacity: 1;
}

.chatbox__title__tray span {
    width: 12px;
    height: 12px;
    display: inline-block;
    border-bottom: 2px solid #fff
}

.chatbox__title__close svg {
    vertical-align: middle;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke-width: 1.2px;
}

.chatbox__body{
    padding: 15px;
    border-top: 0;
    background-color: #f5f5f5;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;

    -webkit-flex-grow: 1;
    flex-grow: 1;
}


.chatbox__body {
    overflow-y: auto;
}

.chatbox__body__message {
    position: relative;
}

.chatbox__body__message p {
    padding: 15px;
    border-radius: 4px;
    font-size: 14px;
    background-color: #fff;
    -webkit-box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
    box-shadow: 1px 1px rgba(100, 100, 100, 0.1);
}

.chatbox__body__message img {
    width: 40px;
    height: 40px;
    border-radius: 4px;
    border: 2px solid #fcfcfc;
    position: absolute;
    top: 15px;
}

.chatbox__body__message--left p {
    margin-left: 15px;
    padding-left: 30px;
    text-align: left;
}

.chatbox__body__message--left img {
    left: -5px;
}

.chatbox__body__message--right p {
    margin-right: 15px;
    padding-right: 30px;
    text-align: right;
}

.chatbox__body__message--right img {
    right: -5px;
}

.chatbox__message {
    padding: 15px;
    min-height: 50px;
    outline: 0;
    resize: none;
    border: none;
    font-size: 12px;
    border: 1px solid #ddd;
    border-bottom: none;
    background-color: #fefefe;
}

</style>


<title>Chat Box</title>
</head>



<script>
(function($) {
    $(document).ready(function() {
        var $chatbox = $('.chatbox'),
            $chatboxTitle = $('.chatbox__title'),
            $chatboxTitleClose = $('.chatbox__title__close');
        $chatboxTitle.on('click', function() {
            $chatbox.toggleClass('chatbox--tray');
        });
        $chatboxTitleClose.on('click', function(e) {
            e.stopPropagation();
            $chatbox.addClass('chatbox--closed');
        });
        $chatbox.on('transitionend', function() {
            if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
        });
       
    });
})(jQuery);</script>



<body>
<div class="chatbox chatbox--tray chatbox">
    <div class="chatbox__title">
        <h5><a href="#">SME Member Support</a></h5>
        <button class="chatbox__title__tray">
            <span></span>
        </button>
        <button class="chatbox__title__close">
            <span>
                <svg viewBox="0 0 12 12" width="12px" height="12px">
                    <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
                    <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
                </svg>
            </span>
        </button>
    </div>
    
 <div class="chatbox__body">
    
            <div class="chatbox__body__message chatbox__body__message--left">
            <img src="images/cardsmebank.png" alt="Picture">
                <p>Hello! Welcome to CARD SME Bank Live Chat support!
I wanted to mention that this chat may be recorded for quality assurance, and its purpose is to help you! You can ask anything here. </p>
        </div>
        
   <?php  $sql = "SELECT * FROM `tblchat` Order by `CID`";
						$result = $conn->query($sql);
						while ($r = $result->fetch_assoc()) {
     ?>
     
                     
                       <div class="chatbox__body__message chatbox__body__message--left">
                       <?php if($r['AID']==1){ ?>
            <img src="images/cardsmebank.png" alt="Picture">
               <?php } else {
         ?> <img src="images/userprofile.jpg" alt="Picture">
               <?php } ?>
                <p><?php echo $r['message'];?></p>
        </div>      
                          <?php } ?>    
                               
                            
                            
                            
                            
  
          
          
<hr>
		
    </div>
    
           <footer class="footer-basic-centered">
		<div class="form-group">
			<form action="send.php" method="POST">
				<textarea class="form-control" placeholder="Type your message..." name="msg" id="typing"></textarea>
				<button type="submit" name="submit" class="btn btn-success form-control">Send</button>
			</form>
		</div>
	</footer>
</div>
</body>
</html>