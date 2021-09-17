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
	<form action="employeea.php" class="w3-card-4 w3-padding w3-light-grey w3-margin" method="POST" onsubmit="return check()">
		<label>Enter employee name</label><input id="inp1" type="text" class="w3-input w3-round-xxlarge" name="name" required>
		<label>Enter Salary</label><input type="number" id="inp2" class="w3-input w3-round-xxlarge" name="salary" required>
		<select class="w3-select w3-margin-top w3-margin-bottom w3-round-xxlarge" name="type">
			<option selected disabled>Select employee type</option>
			<option value="s">Room serving</option>
			<option value="r">Restuarent employee</option>
		</select>
		<label>Enter Phone number</label><input type="text" id="inp3" class="w3-input w3-round-xxlarge" name="phno" required>	
		<label>Enter employee address</label><input type="text" id="inp4" class="w3-input w3-round-xxlarge" name="address" required>
		<button type="submit" class="w3-button w3-hover-green w3-margin w3-padding w3-black w3-round-xxlarge" name="sub">Add new employee</button>	
	</form>
	<?php
	if(isset($_POST['sub']))
	{
		if($_POST['type']=="s")
		{
			$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
			$name=$_POST['name'];
			$salary=$_POST['salary'];
			$typ=$_POST['type'];
			$phno=$_POST['phno'];
			$add=$_POST['address'];
			$id=0;
			$q='select * from employee';
			$p=$pd->query($q);
			while($row=$p->fetch())
			{
				if($id<$row[0] and $row[0]<107)
				{
					$id=$row[0];
				}
			}
			if($id<107)
			{
			$id=$id+101;
			$s=$pd->prepare("insert into employee values(?,?,?,?,?,?)");
			$s->bindparam(1,$id);
			$s->bindparam(2,$name);
			$s->bindparam(3,$salary);
			$s->bindparam(4,$typ);
			$s->bindparam(5,$phno);
			$s->bindparam(6,$add);
			$s->execute();
			echo '<h1 class="w3-container w3-green w3-padding w3-margin">
				Employee added successfully<br>
				Employee Id : '.$id.'
			</h1>';
			}
			else
			{
				echo '<h1 class="w3-container w3-red w3-padding w3-margin">
				No vacancies for employees
			</h1>';
			}
		}
		else
		{
			$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
			$name=$_POST['name'];
			$salary=$_POST['salary'];
			$typ=$_POST['type'];
			$phno=$_POST['phno'];
			$add=$_POST['address'];
			$id=110;
			$q='select * from employee';
			$p=$pd->query($q);
			while($row=$p->fetch())
			{
				if($id<$row[0])
				{
					$id=$row[0];
				}
			}
			if($id<117)
			{
			$id=$id+1;
			$s=$pd->prepare("insert into employee values(?,?,?,?,?,?)");
			$s->bindparam(1,$id);
			$s->bindparam(2,$name);
			$s->bindparam(3,$salary);
			$s->bindparam(4,$typ);
			$s->bindparam(5,$phno);
			$s->bindparam(6,$add);
			$s->execute();
			echo '<h1 class="w3-container w3-green w3-padding w3-margin">
				Employee added successfully<br>
				Employee Id : '.$id.'
			</h1>';
			}
			else
			{
				echo '<h1 class="w3-container w3-red w3-padding w3-margin">
				No vacancies for employees
			</h1>';
			}
		}
	}
	?>
</body>
</html>
<script type="text/javascript">
	function check()
	{
		var inp1=document.getElementById('inp1');
		var inp2=document.getElementById('inp2');
		var inp3=document.getElementById('inp3');
		var inp4=document.getElementById('inp4');
		var phoneno = /^\d{10}$/;
		if(inp1.value=="-")
		{
			alert('Invalid Customer name');
			inp1.focus();
			return false;
		}
		else if(inp2.value<100000)
		{
			alert('Employees should be treated well');
			inp2.focus();
			return false;
		}
		else if(inp2.value>1200000)
		{
			alert('Salary should be less than 12 lakhs');
			inp2.focus();
			return false;
		}
		else if(!inp3.value.match(phoneno))
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