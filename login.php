<?php
session_start();
$mail = $_POST['mail'];
$password = $_POST['password'];

if(!empty($mail) || !empty($password))
{
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname ="MinorProject";

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if (mysqli_connect_error())
	 {
		# code...
		die('Connect Error('.mysql_connect_errno().')'. mysql_connect_error());
	}
	else
	{
		$SELECT = "SELECT name From joinus Where mail = '$mail' and password='$password'";
		$result= mysqli_query($conn,$SELECT);
		$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		
		$count=mysqli_num_rows($result);


		if ($count==1)
		{
			# code...
			session_regenerate_id("mail");
			echo "welcome to your account";

		}
		else
		{
			echo "Your login name or password is invalid";
		}
	


	}
}
else
{
	echo "All fielda are required";
	die();
}
?>