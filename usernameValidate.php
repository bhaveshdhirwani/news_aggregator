<?php

$var=$_GET['username'];

$con=mysqli_connect('localhost','root','12345');
mysqli_select_db($con,"ceryx");
$sql="select username from user";

$res=mysqli_query($con,$sql)or die(mysqli_error($con));
$rowcount=mysqli_num_rows($res);

$there=false;

if(mysqli_num_rows($res)>0)
{
	while($rowcount>0)
	{
		$row=mysqli_fetch_array($res);
		$name=$row['username'];
	
		if($name===$var)
		{
			$there=true;
			break;
		}
		$rowcount--;
	}
}

if($there)
{
	echo "Username exists. Please select new username";
}
else
{
	echo("Username accepted");
}
mysqli_close($con);
?>