<?php
 $msg=""; 
 if (isset($_POST['btn'])){ 
 	$title=$_POST['title_txt'];
 	$thumb=$_POST['thumb_txt'];
 	$content=$_POST['content_txt'];
 	$order=$_POST['order_txt'];
 	$note=$_POST['note_txt'];
 	$st=$_POST['st_txt'];
	$sql_add="INSERT INTO artical_tbl
										VALUES
										   (
										   	null,
										   	'$title',
										   	'$thumb',
										   	'$content',
										   	'$order',
										   	'$note',
										   	$st)"; 

									
	$exec=mysqli_query($conn,$sql_add);
	if ($exec)
		$msg="Insert Successfull...!";
	else
		$msg="Insert fail.... Please Insert again!".mysqli_Error($conn);
 	
 }
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Article Page</title>
</head>
<body>
	<h1>Create New Article</h1>
<hr size="2" color="blue">
<form method="post">
	
	<table>
		<tr>
			<td>Category:</td>
			<td>
				<select name="c_id">
					<option value="0">Choose Category</option>
				<?php 
					$Sql="SELECT * FROM Category_tbl ORDER BY c_name";
					$exec=mysqli_query($conn,$Sql);
					while ($rw=mysqli_fetch_array($exec)) {
				?>
				<option  value="<?php echo $rw['c_id'];?>">
					<?php echo($rw['c_name']);?>
				</option>
			<?php 

				}
			?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title_txt"></td>
		</tr>
		<tr>
			<td>Thumdnail:</td>
			<td><input type="file" name="thumb_txt"></td>
		</tr>
		<tr>
			<td>Content:</td>
			<td><textarea rows="5" cols="60" name="content_txt"></textarea></td>
		</tr>
		<tr>
			<td>Order_Num:</td>
			<td><input type="text" name="order_txt"></td>
		</tr>
		<tr>
			<td>Status:</td>
			<td>
				<input type="radio" name="st_txt" value="1" checked>Active
				<input type="radio" name="st_txt" value="0" >In-Active

			</td>
		</tr>
		<tr>
			<td>Note:</td>
			<td><textarea rows="3" cols="60" name="note_txt"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn" value="Submit">
				<input type="reset" value="Cancel">
			</td>

		</tr>
		
	</table>
	
	<?php 
		 echo $msg;
		?>
</form>
    <h2 align="center">Information Article</h2>
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
		<tr>
			<th>a_id</th>
			<th>Title</th> 
			<th>Thumbnail</th>
			<th>Content</th>
			<th>Order_num</th>
			<th>note</th>
			<th>Status</th>
		</tr>
		<?php  
           $Sql="SELECT * FROM artical_tbl";
           $Exec=mysqli_query($conn,$Sql);
           $i=0;
           while($rw=mysqli_fetch_array($Exec)){
           	$i++;
           	$st=$rw['status']==1?'Active':'In-Active';
           	echo "<tr>";
           	echo "<td>$i</td>";
           	echo "<td>".$rw['title']."</td>";
           	echo "<td>".$rw['thumbnail']."</td>";
           	echo "<td>".$rw['content']."</td>";
           	echo "<td>".$rw['order_num']."</td>";
           	echo "<td>".$rw['note']."</td>";
           	echo "<td>$st</td>";
           	echo "</tr>";
           }

		?>
	</table> 

</body>
</html>


