        <?php 
			
			$date1 = date_create($_POST['chickin']);
			$date2 = date_create($_POST['checkout']);
			
			$dateIn = $_POST['chickin'];
			$dateOut = $_POST['checkout'];
			$occupancy = $_POST['occupancy'];

			//difference between two dates
			$diff = date_diff($date1,$date2);
			$period = $diff->format("%a");

			//count days
			//echo 'Days Count - '.$diff->format("%a");
		?> 
		
		
		<?php 
		
			$serverName = "localhost";
			$userName = "root";
			$password = "";
			$dbName = "hoteldb";
			$message= " ";
			$roomNumber = "";
			$confCode = 1200345 + $roomNumber;
			$confMssg = "Regestration Code: ".$confCode;
			
			//create connection
			$conn = new mysqli($serverName, $userName, $password, $dbName);
			
			//sql to select data
			$sql = "SELECT TODAYPRICE FROM room WHERE CATEGORY = 'Verona Panoramic View' LIMIT 1;";
			//use excec() because no results are returned
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$price = $row['TODAYPRICE'];
			
			//sql to select room numbers
			$sql2 = "SELECT `NUMBER` FROM `ROOM` WHERE `CATEGORY` = 'Verona Panoramic View' ;";
			//use excec() because no results are returned
			$result2 = $conn->query($sql2);
			//store results in an array
			$roomNumbers = [];
			$i = 0;
			while($row2 = $result2->fetch_assoc()) {
				$roomNumbers[$i] = $row2["NUMBER"];
				$i++;
			}
			
			$booked = true;
			foreach($roomNumbers as $roomNum){
				//sql to select CHECH_IN
				$sql5 = "SELECT `CHECK_IN` FROM `booking` WHERE `ROOM_NUMBER` = ".$roomNum.";";
				//use excec() because no results are returned
				$result5 = $conn->query($sql5);
				
				//Check if this room is Booked or not
				if($result5->num_rows == 0){
					$roomNumber = $roomNum;
					$confCode = 1200345 + $roomNumber;
					$confMssg = "Regestration Code: ".$confCode;
					$booked = false;
					break;
				}					
			}
			
			foreach($roomNumbers as $roomNum){
				//Check if this room is Booked or not
				if($booked == false){
					break;
				}
				
				//sql to select MAX CHECH_OUT
				$sqlMax = "SELECT MAX(`CHECK_OUT`) FROM `booking` WHERE `ROOM_NUMBER` = ".$roomNum.";";
				//use excec() because no results are returned
				$resultMax = $conn->query($sqlMax);
				$rowMax = $resultMax->fetch_assoc();
				$maxCkhecout = date_create($rowMax["MAX(`CHECK_OUT`)"]);
				
				//sql to select MIN CHECH_IN
				$sqlMin = "SELECT MIN(`CHECK_IN`) FROM `booking` WHERE `ROOM_NUMBER` = ".$roomNum.";";
				//use excec() because no results are returned
				$resultMin = $conn->query($sqlMin);
				$rowMin = $resultMin->fetch_assoc();
				$minCheckin = date_create($rowMin["MIN(`CHECK_IN`)"]);
				
				$bookin = date_create($_POST['chickin']);
				$bookout = date_create($_POST['checkout']);
				
				if($bookin > $maxCkhecout || $bookout < $minCheckin){
					//echo "valid booking in Room ", $roomNum;
					$roomNumber = $roomNum;
					$booked = false;
					break;
				}
				
				//sql to select CHECH_IN
				$sql3 = "SELECT `CHECK_IN` FROM `booking` WHERE `ROOM_NUMBER` = ".$roomNum.";";
				//use excec() because no results are returned
				$result3 = $conn->query($sql3);
				
				//store results in an array
				$inLen = $result3->num_rows;
				$checkins = [$inLen];
				//ignore first checkin
				//$result3->fetch_assoc();
				$j = 0;
				while($row3 = $result3->fetch_assoc()) {
					$checkins[$j] = $row3["CHECK_IN"];
					$j++;
				}
				//$checkins = array_diff($checkins, [$rowMin]);
				//unset($checkins[$rowMin]);
				sort($checkins);
				//echo $checkins[0];
				unset($checkins[0]);
				//echo "      count in:  ", count($checkins), "      ";
				
				//sql to select CHECH_OUT
				$sql4 = "SELECT `CHECK_OUT` FROM `booking` WHERE `ROOM_NUMBER` = ".$roomNum.";";
				//use excec() because no results are returned
				$result4 = $conn->query($sql4);
				
				//store results in an array
				$outLen = $result4->num_rows;
				$checkouts = [$outLen];
				
				$k = 0;
				while($row4 = $result4->fetch_assoc()) {
					$checkouts[$k] = $row4["CHECK_OUT"];
					$k++;					
				}
				sort($checkouts);
				//echo $checkouts[$outLen-1];
				unset($checkouts[$k-1]);
										
				//Create Associative Array 'array_combine'
				$booking = array_combine($checkouts, $checkins);
				
				foreach($booking as $chkout => $chkin){
					$chkoutDate = date_create($chkout);
					$chkinDate = date_create($chkin);
					
					if($bookin > $chkoutDate and $bookout < $chkinDate){
						$roomNumber = $roomNum;
						//echo "valid interval Room ", $roomNumber;
						$booked = false;
						break;
					}
				}
			}
			
			if($roomNumber == null){
				$message = "Sorry This Room is Booked at this period!";	
				$confMssg = "";
			}
		
		?>
        
        <?php		
			// define variables and set to empty values
			$name = $email = $cost = $gender = $phone = $cridit  = $pin = $name_on_card = $country = $city = "";
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