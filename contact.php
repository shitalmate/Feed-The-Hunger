<?php
$name = $_POST['name'];
$mnumber = $_POST['mnumber'];
$mail = $_POST['mail'];

$message = $_POST['message'];


if(!empty($name) || !empty($mnumber) || !empty($mail) || !empty($message))
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
		$SELECT = "SELECT mail From joinus Where mail = ? Limit 1";
		$INSERT = "INSERT Into contact (name, mnumber, mail, message) values(?,?,?,?)";

		

		
			

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sdss", $name, $mnumber, $mail, $message);
			$stmt->execute();
			include 'reply.html';
			include 'main1.html';

		
		$stmt->close();
		$conn->close();


	}
}
else
{
	echo "All fielda are required";
	die();
}
?>