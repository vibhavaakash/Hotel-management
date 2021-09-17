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
<div class="w3-left w3-margin w3-padding">
	<form action="employeea.php" class="w3-margin w3-padding" method="POST">
		<button class="w3-button w3-black w3-round-xxlarge" type="submit">Add new employee</button>
	</form>
	<form action="employeed.php" class="w3-margin w3-padding" method="POST">
		<button class="w3-button w3-black w3-round-xxlarge" type="submit">update employee details</button>
	</form>
	<form action="employeedet.php" class="w3-margin w3-padding" method="POST">
		<button class="w3-button w3-black w3-round-xxlarge" type="submit">show employee details</button>
	</form>

	<form action="employeedel.php" class="w3-margin w3-padding" method="POST">
		<button class="w3-button w3-black w3-round-xxlarge" type="submit">delete employee details</button>
	</form>
</div>
</div>
	<?php  
		$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
		$q='select * from employee';
		$p=$pd->query($q);
		$count1=0;
		$count2=0;
		$req1=6;
		$req2=6;
		while ($row=$p->fetch()) {
			if($row[0]<107)
			{
				$count1=$count1+1;
			}
			else{
				$count2=$count2+1;
			}
			$req1=6-$count1;
			$req2=6-$count2;
		}
		echo '<table class="w3-table w3-margin w3-striped w3-border w3-right w3-third">
		<tr>
		<td>Room service employees required</td>
		<td>'.$req1.'</td>
		</tr>
		<tr>
		<td>restuarent employees required</td>
		<td>'.$req2.'</td></tr></table>';
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
</script>   
</script>