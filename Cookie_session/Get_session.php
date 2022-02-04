<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Get Session</h1>
	<?php 
	if (isset($_SESSION['mail'])){
	 echo "my email is:".$_SESSION['mail'];
	}
	else{
		echo "Session not found";
	}
	?>


</body>
</html>