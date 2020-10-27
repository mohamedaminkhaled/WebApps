<DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="http://localhost/HotelDemo/home_page/main.css">
		<style>
			body {
				  background-image: url("panoramic_corner_king.jpg");
				  background-repeat: no-repeat;
				  background-position: 0 68px;
				  background-attachment: scroll;
				  background-size: 100% 400px;
			}
			
			.active{
				color:DarkGoldenRod;
			}
			
			.titles{
				font-size: 28px;
				font-family: Tw Cen MT;
			}
			
			.message{
				color: red;
				font-size: 24px;
				font-weight: bold;
				text-align: center;
			}
			
		</style>
	</head>
	<body>
		<!-- Navigation bar -->
		
		<ul style="margin: 0px 120px 0px 97px;">
			<li><a class="logo" href="D:\courses\software engineering\Web\Projects\HotelDemo\home\home.html" target="_self"><img class="logo" src="logo.jpg"></a></li>
			<li><a href="D:\courses\software engineering\Web\Projects\HotelDemo\home\home.html" target="_self">Home</a></li>
			<li><a class="active" href="D:\courses\software engineering\Web\Projects\HotelDemo\rooms\rooms.html" target="_self">Rooms</a></li>
			<li><a href="D:\courses\software engineering\Web\Projects\HotelDemo\dining\dining.html" target="_self">Dining</a></li>
			<li><a href="D:\courses\software engineering\Web\Projects\HotelDemo\nightlife\nightlife.html" target="_self">Nightlife</a></li>
			<li><a href="D:\courses\software engineering\Web\Projects\HotelDemo\entertainment\entertainment.html" target="_self">Entertainment</a></li>
			<li><a href="D:\courses\software engineering\Web\Projects\HotelDemo\meeting\meetings.html">Meetings&Weddings</a></li>
		</ul>
		
		<!-- intro -->
		
		<div><p id="p_welcom" style="margin-bottom:20px;">Verona Panoramic Corner King</p><p id="welcom_msg">Unique corner rooms from 28th floor and above showcase view of verona city through floor-to-celing windows.</p></div>
		
		<?php
			// define variables and set to empty values
			$name = $email = $gender = $phone = $cridit  = $pin = $name_on_card = $country = $city = "";
			$message = "";
			$confCode = 1200345;
			
			$id = 0;
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  
			  if (empty($_POST["conf"])) {
				  $message = "Check Room availability at this period, or Check confirmation code!";
			  }
			  else{
				  $message = "Your Booking performed soccessfully";
				  $roomNumber = $_POST["conf"] - $confCode;
				  $amount = test_input($_POST["cost"]);
				  
				  $serverName = "localhost";
				  $userName = "root";
				  $password = "";
				  $dbName = "hoteldb";
				
				  //create connection
				  $conn = new mysqli($serverName, $userName, $password, $dbName);
				  // Check connection
				  if ($conn->connect_error) {
					  die("Connection failed: " . $conn->connect_error);
				  }
				  
				  //INSERT Guest information
				  $sqlGuest = "INSERT INTO `guest`(`GUESTNAME`, `COUNTRY`, `CITY`, `EMAIL`, `PHONENUMBER`) VALUES ("."'". $_POST['name'] ."'".",". "'". $_POST['country'] ."'".",". "'". $_POST['city'] ."'".","."'". $_POST['email'] ."'".","."'". $_POST['phone'] ."'".");";
				  $conn->query($sqlGuest);
				  
				  //INSERT Booking information
				  $sqlBooking = "INSERT INTO `booking`(`ROOM_NUMBER`, `CHECK_IN`, `CHECK_OUT`, `OCCUPANCY`) VALUES ("."'". $roomNumber ."'".",". "'". $_POST['checkin'] ."'".",". "'". $_POST['checkout'] ."'".","."'". $_POST['occupancy'] ."'".");";
				  $conn->query($sqlBooking);
				  
				  //sql to select data
				  $sqlGuestID = "SELECT MAX(`ID`) FROM GUEST WHERE GUESTNAME = "."'".$_POST['name']."'"." AND EMAIL = "."'".$_POST['email'] ."'".";";
				  //use excec() because no results are returned
				  $resultID = $conn->query($sqlGuestID);
				  $rowID = $resultID->fetch_assoc();
				  $guestID = $rowID['MAX(`ID`)'];
				  
				  //INSERT Billing information
				  $sqlBilling = "INSERT INTO `bill`(`GUESTID`, `AMOUNT`, `DATE`) VALUES ("."'". $guestID ."'".",". "'". $_POST["cost"] ."'".",". "'". date("y-m-d") ."'".");";
				  $conn->query($sqlBilling);
				  
				  //INSERT GuestRoom information
				  $sqlGuestRoom = "INSERT INTO `guestroom`(`ROOMNUMBER`, `GUESTID`) VALUES ("."'". $roomNumber ."'".",". "'". $guestID ."'".");";
				  $conn->query($sqlGuestRoom);
			  }
			  
			  if (empty($_POST["name"])) {
				$nameErr = "required";
			  } else {
				$name = test_input($_POST["name"]);
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				  $nameErr = "Only letters and white space allowed";
				}
			  }
			  
			    if (empty($_POST["email"])) {
				  $emailErr = "Email is required";
			  } else {
				$email = test_input($_POST["email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  $emailErr = "Invalid email format";
				}
			  }
				
			    if (empty($_POST["name_on_card"])) {
				  $name_on_card = "";
			  } else {
				$name_on_card = test_input($_POST["name_on_card"]);
				}

			  if (empty($_POST["phone"])) {
				$phone = "";
			  } else {
				$phone = test_input($_POST["phone"]);
			  }
			  
			  if (empty($_POST["country"])) {
				$country = "";
			  } else {
				$country = test_input($_POST["country"]);
			  }
			  
			  if (empty($_POST["city"])) {
				$city = "";
			  } else {
				$city = test_input($_POST["city"]);
			  }
			  
			  if (empty($_POST["pin"])) {
				$pin = "";
			  } else {
				$pin = test_input($_POST["pin"]);
			  }
			  
			  if (empty($_POST["cridit"])) {
				$cridit = "";
			  } else {
				$cridit = test_input($_POST["cridit"]);
			  }
			  
			  if (!empty($_POST["gender"])) {
				$gender = test_input($_POST["gender"]);
			  }
			  
			}

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
		?>
		
		<p class = "message"><?php echo $message;?></p>
		
		
		
	</body>
</html>