<?php
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'information');
	$regno=$_REQUEST['pk'];
	$q="select * from student where regno='$regno'";
	$rs=mysqli_query($con,$q);
	$row=mysqli_fetch_array($rs);
	$filename=$row['cv'];
	unlink('cv/'.$filename);
	//date('d-m-y h m s');
	$q="delete from student where regno='$regno'";
	$r=mysqli_query($con,$q);
	if(!$r)
	{
		echo mysqli_error($mysql);
	}else {
	
		header('location:index.php?msg=2');
	
	}

?>