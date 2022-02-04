<?php 
session_start();
 require("CMS/connect.php");
$msg="";
 if (isset($_POST['btn_login'])){
 	$uname=$_POST['unametxt'];
 	$pwd=md5($_POST['pwdtxt']);
 	$sql_check="SELECT * FROM users_tbl 
 						WHERE 
 							  username='$uname' AND
 							  password='$pwd'   AND 
 							  status=1";
 	$exec=mysqli_query($conn,$sql_check);
 	$count=mysqli_num_rows($exec);
 	if ($count>0) {
 		$_SESSION['uname']=$uname;
 		$_SESSION['ulog']=true;
 		header("Location: CMS/");
 	}
 	else{
 		$msg="Invalid Username and password.Please enter try again.";
 	
 	}

 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Admin Page</title>
	<style type="text/css">
		body{
			margin: 50px;
			font-family:arial;
			font-size: 14px;
			color: white;
			background: lightblue;

		}
		#frm_login{
			background-image: linear-gradient(rgba(0,0,100,0.5),rgba(0,0,100,0.5)),url(../image/im.jpg);
			box-shadow: 0 0 20px 10px rgba(0,0,0,10);
			background-size: cover;
			box-sizing: border-box;
			border: 2px solid;
			width: 400px;
			height:570px;
			margin: 0 auto;
			padding: 15px;
			border-radius: 24px;
		}
		input[type='text'],input[type='password']{
			
			width: 97%;
			height: 30px;
			font-size: 16px;
			margin: 20px 0;
			border-radius: 15px;
			border: 1px solid;
		}
		input[type='submit']{
			background: green;
			font-size: 20px;
			color: yellow;
			font-weight: bold;
			width: 150px;
			height: 40px;
			border: none;
			padding: 5px 15px;
			margin: 10px 0;
			float: right;
			border-radius: 15px;
			
		}
		input[type='checkbox']{
			width:20px;
			height: 20px;
			margin: 5px 5px;
		}
		.clear{
			width: 0;
			height: 0;
			margin: 0;
			padding: 0;
			clear: both;
		}
       p,a{
       	padding: 10px 5px;
       	color: white;
       	font-weight: bold;
       	font-size: 16px;
       }
       h1{
       	font-size: 28px;
       	font-weight: bold;
       	color: red;
       }
       h4{
       	padding: 0;
       	margin: 0;
       }

	</style>
</head>
<body>
	<h1 align="center">Login System</h1>
	<div id="frm_login">
		<P align="center">Please Enter Your USERNAEM & PASSWORD</P>
	<form method="post">
		<h4>UERNAME:</h4><br />
		<input type="text" name="unametxt" placeholder="ENTER USERNAME"><br />
		<h4>PASSWORD:</h4><br />
		<input type="password" name="pwdtxt" placeholder="ENTER PASSWORD">
		<p>
			Remember me?<input type="checkbox" name="remember" value="1">
		</p>
		<p>
			<a href="#"> Reginster?</a> | <a href="#"> Forgot Password?</a>
		</p>
		<input type="submit" name="btn_login" value="LOGIN">
		<p class="clear" />
		<p><?php echo $msg;?></p>

	</form>
</div>

</body>
</html>