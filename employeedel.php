<!DOCTYPE html>
<html>
<head>
	<title>Hotel</title>
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style type="text/css">
		.w3-lobster {
		  font-family: "Comic Sans MS", cursive, sans-serif;
		}
		#home{
		border-style: solid;
		border-width: 0px 0px 10px 0px;

		color:#cccccc
		}
		</style>
</head>
<body>
<div>
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
	<form onsubmit="return check()" action="employeedel.php" method="POST">
		<input type="number" name="room" class="w3-input w3-third" placeholder="Enter employee id here">
		<button name="sub" class="w3-button w3-black" type="submit">delete employee</button>
	</form>
	<?php
		if(isset($_POST['sub']))
		{
			$room=$_POST['room'];
			$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
			$q='select * from employee';
			$p=$pd->query($q);
			$access=1;
			while($row=$p->fetch())
			{
				if($row[0]==$room)
				{
					$access=0;
				}
			}
			if($access==0)
			{
				$p=$pd->prepare('delete from employee where empid=?');
				$p->bindparam(1,$_POST['room']);
				$p->execute();
				echo '<br><p id="suc" style="color: green;">Employee deleted successfully</p>';
			}
			if($access==1)
			{
				echo '<br><p id="suc" style="color: red;">Employee does not exist</p>';	
			}
		}
	?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
	  $("#suc").delay(1000).fadeOut(1500);
	});
</script>