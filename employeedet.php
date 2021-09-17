<!DOCTYPE html>
<html>
<head>
	<title>Hotel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
		.w3-lobster {
		  font-family: "Comic Sans MS", cursive, sans-serif;
		}
		#home{
		border-style: solid;
		border-width: 0px 0px 10px 0px;

		color:#cccccc
		}
		body{
			background-image: url("background.jpg");
		}
		</style>
</head>
<body>
	<h1 style="height: 200px" class="w3-margin-top w3-padding-32 w3-blue w3-lobster w3-center w3-container">
		Hotel management system
		<br>
	<div class="w3-margin-top w3-bottom-middle w3-large w3-bar w3-black">
	  <a href="home.php" class="w3-bar-item w3-button w3-mobile">Home</a>
	  <a href="customer.php" class="w3-bar-item w3-button w3-mobile">Customer</a>
	  <a href="booking.php" class="w3-bar-item w3-button w3-mobile">Booking</a>
	  <a href="employee.php" class="w3-bar-item w3-button w3-mobile">Employee</a>
	  <a href="dining.php" class="w3-bar-item w3-button w3-mobile">Dining</a>
	  <a href="finance.php" class="w3-bar-item w3-button w3-mobile">Finance</a>
	</div>
	</h1>
	<form action="employeedet.php" method="POST">
		<select name="id" class="w3-select w3-third w3-margin w3-xlarge">
		<option value="disabled">Select employee id</option>
		  <option value=101>101</option>
		  <option value=102>102</option>
		  <option value=103>103</option>
		  <option value=104>104</option>
		  <option value=105>105</option>
		  <option value=106>106</option>
		  <option value=111>111</option>
		  <option value=112>112</option>
		  <option value=113>113</option>
		  <option value=114>114</option>
		  <option value=115>115</option>
		  <option value=116>116</option>
		</select>
		<br><br><br><br>
		<button type="submit" class="w3-button w3-hover-green w3-margin w3-padding w3-black" name="sub">Show</button>
	</form>
	<?php
	$x=0;
		if(isset($_POST['sub']))
		{
			$id=$_POST['id'];
			$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
			$q='select * from employee';
			$p=$pd->query($q);
			while($row=$p->fetch())
			{
				if($row[0]==$id)
				{
					if($row[3]=="s")
					{
						$type="Room servicing";
					}
					else
					{
						$type="Restaurent employee";
					}
					$x=1;
					echo '
					<table class="w3-table w3-half w3-margin w3-striped w3-border">
					<tr>
					  <td>Employee id</td>
					  <td>'.$id.'</td>
					</tr>
					<tr>
					  <td>Employee name</td>
					  <td>'.$row[1].'</td>
					</tr>
					<tr>
					  <td>Salary</td>
					  <td>'.$row[2].'</td>
					</tr>
					<tr>
					  <td>Employee Type</td>
					  <td>'.$type.'</td>
					</tr>
					<tr>
					  <td>Phone number</td>
					  <td>'.$row[4].'</td>
					</tr>
					<tr>
					  <td>Address</td>
					  <td>'.$row[5].'</td>
					</tr>
					</table>';
				}
			}
			if($x==0)
					{
						echo '<font class="w3-margin" color="red">employee does not exist</font>
';
					}
		}
	?>
</body>
</html>