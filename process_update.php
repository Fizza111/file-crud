<?php

		$con=mysqli_connect('localhost','root','');
		mysqli_select_db($con,'information');
		
		$regno=$_REQUEST['reg'];
		$name=$_REQUEST['n'];
		$email=$_REQUEST['em'];
		$dob=$_REQUEST['dob'];
		$filename=$_FILES['cv']['name'];
		if($filename==''){
				$filename=$_REQUEST['previous_file'];
		}
		move_uploaded_file($_FILES['cv']['tmp_name'],'cv/'.$filename);
		
		
		$q="update student set name='$name',email='$email',dob='$dob',cv='$filename' where regno='$regno'";
		
		$r=mysqli_query($con,$q);
		if(!$r){
			echo mysqli_error($mysql);
		}else {
			header('location:index.php?msg=3');
			//echo "Data has been successfully inserted";
		}

?>