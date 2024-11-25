<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	
</head>
<body>
	<main id="container" style="display:flex; justify-content:center">
        <form action="process.php" method="post" enctype="multipart/form-data">
		
<div style="width: 80%;margin:50px">
        <div>
            <label>Reg No</label>
            <input type="text" name="reg">
        </div>
		<div>
            <label>Name</label>
            <input type="text" name="n">
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="em">

        </div>
		<div>
            <label>Dob</label>
            <input type="date" name="dob">

        </div>
		<div>
            <label>Upload CV</label>
            <input type="file" name="cv">

        </div>
        <div>
            <input type="submit">
        </div>
</div>
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
			if(isset($_REQUEST['msg']) && $_REQUEST['msg']==3)
			{
				echo "Data has been updated Successfully";
			}
		
		?>
		</font>
</form>
</main>
	<table width="80%" align="center" border="1">
	<caption>Listing Student Record</caption>
		<tr>
			<th>Sr#</th>
			<th>REgistration no</th>
			<th>Name</th>
			<th>Email</th>
			<th>Date of Birth</th>
			<th>Download CV</th>
			<th>Action</th>
		</tr>
		
		<?php 
				$con=mysqli_connect('localhost','root','');
				mysqli_select_db($con,'information');
				$q="select * from student";
				$r=mysqli_query($con,$q);
				//print_r($r);
				
				
				$cnt=1;
				while($row=mysqli_fetch_array($r))
				{
				//print_r($row);
		?>
		<tr align="center">
			<td><?php echo $cnt++; ?></td>
			<td><?php echo $row['regno']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['dob']; ?></td>
			<td><a download href="cv/<?php echo $row['cv']; ?>"> Download CV</a></td>
			<td><a onClick="return confirm('Are you Sure');" href="delete_process.php?pk=<?php echo $row['regno']; ?>">Delete</a> &nbsp;&nbsp;&nbsp;<a href="edit.php?pk=<?php echo $row['regno']; ?>"> Edit</a></td>
			
		</tr>
		<?php }?>
	</table>
</body>
</html>




