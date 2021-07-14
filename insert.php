<?php
$name = $_POST['name'];
$mnumber = $_POST['mnumber'];
$mail = $_POST['mail'];

$address = $_POST['address'];
$city = $_POST['city'];

if(!empty($name) || !empty($mnumber) || !empty($mail) || !empty($address) || !empty($city))
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
		$INSERT = "INSERT Into joinus (name, mnumber, mail, address, city) values(?,?,?,?,?)";

		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $mail);
		$stmt->execute();
		$stmt->bind_result($mail);
		$stmt->store_result();
		$rnum = $stmt->num_rows();

		if ($rnum==0)
		{
			# code...
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sdsss", $name, $mnumber, $mail, $address, $city);
			$stmt->execute();
			include 'thankyou.html';
			include 'main1.html';

		}
		else
		{
			echo "Someone already register using this email";
		}
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