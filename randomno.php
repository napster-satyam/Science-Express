<?php
	if(isset($_POST['submit']))
	{
		$CharSet='1234567890';
		$generated_password = substr(str_shuffle($CharSet),0,6);
	}
?>


<html>
<form action="randomno.php" method="POST">
	<input type="submit" name="submit" value="Generate" >
		
		<?php
		if(isset($generated_password))
				echo $generated_password;
		//else echo 'Not generated';	
		?>
</form>
</html>
