<?php
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'information');
	$regno=$_REQUEST['pk'];
	$q="select * from student where regno='$regno'";
	$result=mysqli_query($con,$q);
	$row=mysqli_fetch_array($result);	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="process_update.php" method="post" enctype="multipart/form-data">
		<font color="#993300">
		<?php
			
			if(isset($_REQUEST['msg']) && $_REQUEST['msg']==1)
			{
				echo "Data has been successfully inserted";
			}
			if(isset($_REQUEST['msg']) && $_REQUEST['msg']==2)
			{
				echo "Data has been deleted Successfully";
			}
		
		?>
		</font>
<div style="width: 80%;margin:50px">
        <div>
            <label>Registration No</label>
            <input type="text" name="reg" value="<?php echo $row['regno'] ?>" readonly="yes">
        </div>
		<div>
            <label>Name</label>
            <input type="text" name="n" value="<?php echo $row['name'] ?>">
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="em" value="<?php echo $row['email']; ?>">

        </div>
		<div>
            <label>Dob</label>
            <input type="date" name="dob" value="<?php echo $row['dob'] ?>">

        </div>
		<div>
            <label>Upload CV</label>
            <input type="file" name="cv">
	<input type="hidden" name="previous_file" value="<?php echo $row['cv']?>" >
				<?php if($row['cv']!=''){ ?><a href="cv/<?php echo $row['cv']; ?>">Download</a> <?php }?>
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
</div>
</form>
	
</body>
</html>