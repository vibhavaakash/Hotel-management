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
	<?php
	if(!isset($_POST['sub1']) || !isset($_POST['sub2']))
	{
		echo '
		<form action="employeed.php" method="POST">
			<select name="id" class="w3-select w3-margin w3-half w3-large">
			<option value="disabled">Select employee id to update</option>
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
			<button type="submit" class="w3-button w3-hover-green w3-margin w3-padding w3-black" name="sub2">update employee details</button>
		</form>';
	}
	if(isset($_POST['sub2']))
	{
	$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
	$q='select * from employee where empid='.$_POST['id'];
	$p=$pd->query($q);
	$access=0;
	while($row=$p->fetch())
	{
		$access=1;
		echo '
			<div class="w3-padding w3-margin w3-light-grey w3-card-4">
			<h1 class="w3-xxxlarge">Present Status of employee</h1>
			<h2>Employee ID : '.$row[0].'<h2>
			<h2>Name : '.$row[1].'<h2>
			<h2>Salary : '.$row[2].'</h2>
			<h2>Phone number : '.$row[4].'</h2>
			<h2>Address : '.$row[5].'</h2>
			</div>
		';
		echo "<div class='w3-padding w3-margin w3-red'>Note : Leave fields blank if no update is required</div>";
	}
	if($access==1)
	{

	echo '
	<form action="employeed.php" class="w3-card-4 w3-margin w3-padding w3-light-grey" onsubmit="return check()" method="POST">
			<label>Enter employee name</label><input id="inp1" type="text" class="w3-input w3-round-xxlarge" name="name">
			<label>Enter Salary</label><input id="inp2" type="number" class="w3-input w3-round-xxlarge" name="salary">
			<label>Enter Phone number</label><input id="inp3" type="text" class="w3-input w3-round-xxlarge" name="phno">	
			<label>Enter employee address</label><input id="inp4" type="text" class="w3-input w3-round-xxlarge" name="address">
			<button value='.$_POST['id'].' type="submit" class="w3-button w3-hover-green w3-margin w3-padding w3-round-xxlarge w3-red" name="sub1">update employee details</button>
	</form>';	
	}
	if ($access==0) {
		echo '<br><p id="suc" style="color: red;">Employee does not exist</p>';	
	}
	}
	if(isset($_POST['sub1']))
	{
		$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
		$id=$_POST['sub1'];
		$name=$_POST['name'];
		$salary=$_POST['salary'];
		$phno=$_POST['phno'];
		$add=$_POST['address'];
		if($name!='')
		{
			$s=$pd->prepare("update employee set name=? where empid=?");
			$s->bindparam(1,$name);
			$s->bindparam(2,$id);
			$s->execute();
		}
		if($salary!='')
		{
			$s=$pd->prepare("update employee set salary=? where empid=?");
			$s->bindparam(1,$salary);
			$s->bindparam(2,$id);
			$s->execute();
		}
		if($phno!='')
		{
			$s=$pd->prepare("update employee set phno=? where empid=?");
			$s->bindparam(1,$phno);
			$s->bindparam(2,$id);
			$s->execute();
		}
		if($add!='')
		{
			$s=$pd->prepare("update employee set address=? where empid=?");
			$s->bindparam(1,$add);
			$s->bindparam(2,$id);
			$s->execute();
		}
		echo "<h1 class='w3-green w3-margin w3-padding'>Employee details are updated successfully<button class='w3-button w3-red w3-round-xxlarge w3-margin-left' onclick='redirect()'>Go Back</button></h1>";
	}
	?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
	  $("#suc").delay(2200).fadeOut(300);
	});
	function redirect()
	{
		window.location="employee.php";
	}
	function check()
	{
		var inp1=document.getElementById('inp1');
		var inp2=document.getElementById('inp2');
		var inp3=document.getElementById('inp3');
		var phoneno = /^\d{10}$/;
		var regex = /^[a-zA-Z]*$/;
		if(!inp1.value.match(regex) && inp1.value.length!=0)
		{
			alert('Invalid Employee name');
			inp1.focus();
			return false;
		}
		else if(inp2.value<100000 && inp2.value.length!=0)
		{
			alert('Employees salary should not be less than 1 lakh');
			inp2.focus();
			return false;
		}
		else if(inp2.value>1200000 && inp2.value.length!=0)
		{
			alert('Salary should be less than 12 lakhs');
			inp2.focus();
			return false;
		}
		else if(!inp3.value.match(phoneno) && inp3.value.length!=0)
		{
			alert('Phone number should not contain text and ph.no should be 10 digits');
			inp3.focus();
			return false;
		}
		else
		{
			return true;
		}
	}
</script>