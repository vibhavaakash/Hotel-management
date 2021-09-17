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
	<?php
	try
	{
		$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
	}
	catch(PDOException $e)
	{
		echo 'unable to connect';
		exit();
	}
	echo '<div class="w3-card-4 w3-round w3-margin w3-center w3-padding w3-light-grey  w3-topbar w3-border-blue" style="width: 500px;height: 200px;position: relative;top:0px;left:500px">
		<form action="customer.php" method="POST">
		<h1 class="w3-xxlarge w3-margin">Check customer details</h1>
		<input pattern="[1][0-2][0-9]" placeholder="Enter room number here" type="text" name="num" class="w3-half w3-input">
		<button class="w3-button w3-center w3-black">Check</button>
		</form>
		<br>
		';
	echo '
		<form action="customer.php" method="POST">
		<input placeholder="Enter customer name" type="text" name="name" class="w3-half w3-input">
		<button id="textName" class="w3-button w3-center w3-black">Check</button>
		</form>
		</div>';
		$count=0;
	if(isset($_POST['num']))
	{
		$q='select * from rooms where number='.$_POST["num"];
		$p=$pd->query($q);
		while($row=$p->fetch())
		{
		if($row[0]==$_POST['num'] && $row[1]!="-")
		{
			echo "<div class='w3-container w3-margin w3-card-3'>";
			echo '<table class="w3-table-all"><thread><tr class="w3-black"><th><h5>Room number</h5></th><th><h5>Customer name</h5></th><th><h5>number of beds</h5></th><th><h5>type</h5></th><th><h5>Employee dealing</h5></th><th><h5>Phone number</h5></th><th><h5>Address</h5></th><th><h5>Number of children</h5></th><th><h5>Check in time</h5></th></tr></thread>';

			$count=$count+1;
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td></tr>";
			echo "</table></div>";
		}
		if($row[1]=="-")
		{
			echo "<p class='w3-margin w3-padding' style='color:red;position:relative;left:500px'>This room has no customers, it's empty</p>";
		}
		}
		if($_POST['num']>130)
		{
			echo "<p class='w3-margin w3-padding' style='color:red;position:relative;left:500px'>This room is not available</p>";
		}
	}
	if(isset($_POST['name']))
	{
		$q='select * from rooms';
		$p=$pd->query($q);
		while($row=$p->fetch())
		{
			if($row[1]==$_POST['name'])
			{
			$count=$count+1;
			echo "<div class='w3-container w3-margin'>";
			echo '<table class="w3-table-all"><thread><tr class="w3-black"><th><h5>Room number</h5></th><th><h5>Customer name</h5></th><th><h5>number of beds</h5></th><th><h5>type</h5></th><th><h5>Employee dealing</h5></th><th><h5>Phone number</h5></th><th><h5>Address</h5></th><th><h5>Number of children</h5></th><th><h5>Check in time</h5></th></tr></thread>';
				echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td></tr>";
				echo "</table></div>";
			}
		}
		if($count==0)
		{
			echo "<p class='w3-margin w3-padding' style='color:red;position:relative;left:500px'>No customers with this name</p>";
		}
	}
	?>
</body>
</html>
<script type="text/javascript">
function binarySearch(array, target){
  let startIndex = 0;
  let endIndex = array.length - 1;
  while(startIndex <= endIndex) {
    let middleIndex = Math.floor((startIndex + endIndex) / 2);
    if(target === array[middleIndex) {
      return console.log("Target was found at index " + middleIndex);
    }
    if(target > array[middleIndex]) {
      console.log("Searching the right side of Array")
      startIndex = middleIndex + 1;
    }
    if(target < array[middleIndex]) {
      console.log("Searching the left side of array")
      endIndex = middleIndex - 1;
    }
    else {
      console.log("Not Found this loop iteration. Looping another iteration.")
    }
  }

  console.log("Target value not found in array");
}
$('#textName').keypress(function (e) {
        var regex = new RegExp("/^[a-zA-Z\s]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        alert('Please Enter Alphabate');
        return false;
        }
    });
</script>
