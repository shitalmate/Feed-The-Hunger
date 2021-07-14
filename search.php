
			<!DOCTYPE html>
           <html>
           <head>
		   </head>
		   <body>
		   
		      <table style="width:100%">
			  <thead>
               <tr>
                   <th>NAME</th>
                   <th>MOBILE-NO.</th>
                   <th>MAIL-Id</th>
				   <th>ADDRESS</th>
				   <th>CITY</th>
               </tr>
			   </thead>
			   <tbody style="text-align:center">
			   
			   <?php
    require 'donate.html';
	
    $city = $_POST['city'];
    
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
		$SELECT = "SELECT * From joinus where city='$city'";
		$query = mysqli_query($conn,$SELECT);
		$nums = mysqli_num_rows($query);
	    while($res=mysqli_fetch_array($query)){
			?>
			
			  <tr>
                   <td><?php echo $res['name'];?></td>
                   <td><?php echo $res['mnumber'];?></td>
                   <td><?php echo $res['mail'];?></td>
				   <td><?php echo $res['address'];?></td>
				   <td><?php echo $res['city'];?></td>
               </tr>
			   <?php
		}
		?>
			   
			   
			   
             
               </tbody>
              </table>
		   </body>
			<?php
		

		


	
	
	die();
    }
?>