<?php 
   session_start();
    require("connect.php");
   $tag="";
   if (isset($_GET['tag']))
        $tag=$_GET['tag'];
   
   if ($tag=="logout")
   	   unset($_SESSION['ulog']);

  if (isset($_SESSION['ulog'])!=true){
  	 header("Location:../");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		
	body{
		margin: 0;
		padding: 0;
		font-size: 14px;
		font-family: arial;
		
	}
	#header{
		background:#00ccff ;
		color: white;
		padding: 10px;
	}
	#h_right {
		font-size: 16px;
		font-family: arial;
		float: right;
		margin-right: 20px;
		margin-top: -50px;
	}
	#h_right a{
		color: white;
		text-decoration: none;
	}
	#h_right a:hover{
		color: yellow;
		text-decoration: underline;
	}
	#content{
		padding: 10px;

	}
	#dashboard{
		padding: 10px;
		margin: 10px;
		float: left;
		width: 20%;
		border: 2px solid blue;
		border-radius: 8px;
	}
	#dashboard h2{
		padding: 10px;
		background: blue;
		color: white;
		border-radius: 5px;
	}
	#dashboard h3{
		padding-left: 10px;
	}
	#dashboard li{
		font-size: 16px;
		font-family:arial;
	}
	#dashboard a{
		color: blue;
		text-decoration: none;

	}
	#dashboard a:hover{
		color:greenyellow;
		text-decoration: underline;
	}

	#opr{
		padding: 10px;
		margin: 10px;
		float: left;
		width: 65%;
	
	}
	.clear{
		padding: 0;
		margin: 0;
		clear: both;
		height: 0;
		width: 0;

	}
	#footer{
		padding: 10px;
		color: white;
		font-size: 12px;
		text-align: center;
		background:#00ccff ;

	}
	input[type='text'],input[type='password']{
			
			width: 97%;
			height: 30px;
			font-size: 16px;
			margin: 10px 0;
			border-radius: 5px;
			border: 1px solid;
		}
		input[type='submit']{
			background: blue;
			font-size: 20px;
			color: yellow;
			font-weight: bold;
			width: 150px;
			height: 40px;
			border: none;
			padding: 5px 15px;
			margin: 10px 0;
			border-radius: 5px;
			
		}
		input[type='reset']{
			background: #e09112;
			font-size: 20px;
			color: yellow;
			font-weight: bold;
			width: 150px;
			height: 40px;
			border: none;
			padding: 5px 15px;
			margin: 10px 0;
			border-radius: 5px;
			
		}
	</style>
	
	<title>CMS Page</title>
</head>
<body>
	<div id="header">
	<h1>Content Management Page</h1>
		<div id="h_right">
			Login time: <?php echo  date("Y-m-d h:m:s")?>|
			Welcome:<?php echo $_SESSION['uname'];?>|
			 <a href="?tag=logout">LOGOUT</a></div>
</div>
<div id="content">
	<div id="dashboard">
		<h2 align="center">Dashboard</h2>
		<h3>Manage Airticle</h3>
		<ul>
			<li><a href="?tag=new_art">New Airticle</a></li>
			<li><a href="?tag=list_art">List Airticle</a></li>
			<li><a href="?tag=art_gallary">Airticle Gallary</a></li>
		</ul>
		<h3>Manage Banner</h3>
		<ul>
			<li><a href="?tag=upload_banner">Upload Banner</a></li>
			<li><a href="?tag=list_banne">List Banner</a></li>
			<li><a href="?tag=slite_setting">Slide Setting</a></li>
		</ul>
		<h3>Manage Menu</h3>
		<ul>
			<li><a href="?tag=create_Menu">Create Menu</a></li>
			<li><a href="?tag=list Menu">List Menu</a></li>
			<li><a href="?tag=menu setting">Menu  Setting</a></li>
		</ul>
		<h3>Manage Category</h3>
		<ul>
			<li><a href="?tag=new_cate">New Category</a></li>
			<li><a href="?tag=list categtory">List  Category</a></li>
		</ul>
		<h3>Site Profile</h3>
		<ul>
			<li><a href="?tag=profile">Profile</a></li>
			<li><a href="?tag=site_media">Site Media</a></li>
			<li><a href="?tag=other">Other</a></li>
		</ul>
		<h3>Manage Users</h3>
		<ul>
			<li><a href="?tag=create_user">Create User</a></li>
			<li><a href="?tag=user_role">Manage User Role</a></li>
			<li><a href="?tag=page_setting">Page Setting</a></li>
		</ul>
	</div>
	<div id="opr">
	<?php 
	  if($tag=="new_art")
	  	  include("article/new_art.php");

	  else{
	?>
		<h1 align="center">Welcome to Contant Management System</h1>
		<p align="center">Click On Menu to Continue for your work</p>
	<?php
	}
	?>
	</div>
	<p class="clear" />
	
</div>
<div id="footer">
	&copyright; CopyRight 2022 Jan. By Mr.Hong.
	<p>All Right Resered 2022.</p>
</div>
	
</body>
</html>