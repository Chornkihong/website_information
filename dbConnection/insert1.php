<?php
	$conn=mysqli_connect("localhost",'root','','user_db');
	$msg="";
	$op="";
	$id="";
	    if (isset($_GET['op']))
	    	$op=$_GET['op'];
	    	
	    if (isset($_GET['id'])) 
	    	$id=$_GET['id'];

	    //---delete User----//
	    if ($op=='del'){
	    	$Sql_del="DELETE  FROM users_tbl WHERE userid=$id";
	    	$exec=mysqli_query($conn,$Sql_del);
	    	if($exec)
	    		$msg="User Deleted";
	    	else
	    		$msg="Delete fail".mysqli_Error($conn);
	    }

		if (isset($_POST['btn'])){
			$uname=$_POST['utxt'];
			$pass=$_POST['ptxt'];
			$Email=$_POST['mailtxt'];
			$status=$_POST['sttxt'];
			$sql_adduser="INSERT INTO users_tbl VALUES(
			   							null,
			   							'$uname',
			   							'$pass',
			   							'$Email',
			   							$status
										)";
		$execute=mysqli_query($conn,$sql_adduser);
		if ($execute) 
			$msg="User created";
		else
			$msg="User fail".mysqli_Error($conn);
			
		
		}
	?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<title>PhP Connect MySQl Server</title>
	
</head>
<body>
	<div>
		<?php 
		echo $msg;

		?>
	</div>
	<h1>User List:</h1>
	<form method="post">
		<h1 align="center">Input Your Information</h1>
			
		Username:<input type="text" name="utxt"><br><br>
		Password:<input type="password" name="ptxt"><br><br>
		  E-main:<input type="text" name="mailtxt"><br><br>
		  Status:<input type="radio" name="sttxt" value="1" checked> Active
				 <input type="radio" name="sttxt" value="0"> Inactive<br>
			     <input type="Submit" name="btn" value="Create User"><br><br>
			
	</form>
	<table border="=1" width="70%" cellpadding="5" cellspacing="0">
		<tr>
			<th>Userid</th>
			<th>UserName</th>
			<th>Password</th>
			<th>Email</th>
			<th>Status</th>
			<th colspan="2">Operation</th>

		</tr>
		<?php 
			$Sql="SELECT * FROM users_tbl";
			$Exec=mysqli_query($conn,$Sql);
			$i=0;
			while ($row=mysqli_fetch_array($Exec)){
				$i++;
				$st=$row['status']==1?'Active':'Inactive';
				echo "<tr>";

				  echo "<td>$i</td>";
				  echo "<td>".$row['username']."</td>";
				  echo "<td>*******</td>";
				  echo "<td>".$row['Email']."</td>";
				  echo "<td>$st</td>";
				  echo "<td><a href='?op=edt&id=".$row['userid']."'>Edit</a></td>";
				  echo "<td><a onclick=\"return confirm('Are you sure delete this row?')\" href='?op=del&id=".$row['userid']."'>Delete</a></td>";


				echo "</tr>";
			}

		?>
		

	</table>
</body>
</html>