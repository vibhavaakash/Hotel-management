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
			background-image: url("images/background.jpg");
  background-repeat: no-repeat;
  background-size: cover;
		}
		</style>
</head>
<body class="w3-center w3-lobster">
	<div class="w3-card-4 w3-round w3-margin w3-center w3-padding w3-light-grey  w3-topbar w3-border-green" style="width: 400px;height: 500px;position: absolute;top: 70px;left: 150px;">
	<form action="index.php" method="POST">
		<h3 class="w3-container w3-margin w3-padding">Admin Login</h3><br>
		<img class="w3-center" style="width: 20%;height: 20%;border-radius: 50%" src="images/user.png"><br><br><br><br>
		<input type="text" name="user" placeholder="Username" class="w3-input w3-round-xxlarge" required><br>
		<input type="password" name="pass" placeholder="Password" class="w3-input w3-round-xxlarge" required><br>
		<button name="sub" class="w3-button w3-green w3-margin w3-padding" type="submit">Login</button>
	</form>
	</div>
	<?php
	if(isset($_POST['sub']))
	{
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
		$q='select * from admin';
		$p=$pd->query($q);
		while($row=$p->fetch())
		{
			if($row[0]==$user)
			{
				if($row[1]==$pass)
				{
					header("Location: home.php");
				}
				else
				{
					echo '<p style="color: red;position:absolute;top:430px;left:190px">Invalid password</p>';
				}
			}
			else
			{
				echo '<p style="color: red;position:absolute;top:430px;left:190px">Invalid username</p>';
			}
		}
	}
	?>
</body>
</html>