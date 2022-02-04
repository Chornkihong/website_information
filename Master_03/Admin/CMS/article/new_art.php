<?php 
  if(isset($_POST['btn'])){
  }
?>

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
			<td><input type="file" name="thumd_txt"></td>
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
</form>