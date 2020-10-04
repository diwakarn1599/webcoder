<?php 
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbname = "webcoder";
		$conn = mysqli_connect($servername,$username,$dbpassword,$dbname);
		if(!$conn)
		{
			die("database not connected");
		}
?>