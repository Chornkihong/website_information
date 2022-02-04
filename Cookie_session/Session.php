<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Session</title>
</head>
<body>
<h1>Create Session</h1>
<?php 
$_SESSION['mail']="Hong@gmail.com";
echo "Session Created";

?>
</body>
</html>