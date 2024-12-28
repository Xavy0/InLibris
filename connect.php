<?php
	$con = mysqli_connect("localhost","root","");
	if(!mysqli_select_db($con,"library_system")) 
	{
		die("connection error");
	}
?>