<?php

		$regno=$_REQUEST['reg'];
		$name=$_REQUEST['n'];
		$email=$_REQUEST['em'];
		$dob=$_REQUEST['dob'];
		$filename=$_FILES['cv']['name'];
		
		move_uploaded_file($_FILES['cv']['tmp_name'],'cv/'.$filename);
		
		$con=mysqli_connect('localhost','root','');
		mysqli_select_db($con,'information');
		
		$q="insert into student (regno,name,email,dob,cv) values('$regno','$name','$email','$dob','$filename')";
		$r=mysqli_query($con,$q);
		if(!$r){
			echo mysqli_error($mysql);
		}else {
			header('location:index.php?msg=1');
			//echo "Data has been successfully inserted";
		}

?>