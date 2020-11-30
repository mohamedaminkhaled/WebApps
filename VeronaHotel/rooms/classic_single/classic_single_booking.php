<!DOCTYPE HTML>  
<html>
	<head>			
		<link rel="stylesheet" href="http://localhost/HotelDemo/home_page/main.css">
		<style>
			.error {color: #FF0000;}
			
			body {
				  background-image: url("classic_single.jpg");
				  background-repeat: no-repeat;
				  background-position: 0 68px;
				  background-attachment: scroll;
				  background-size: 100% 400px;
			}
			
			.active{
				color:DarkGoldenRod;
			}
			
			.personal-info {
			  text-align: left;
			  font-size: 18px;
			  padding: 20px ;
			  margin:50px 200px 50px 200px ;
			  background-color:Lavender   ;
			  border-radius:10px;
			  box-shadow: 5px 5px 10px LightBlue ;
			}
			
			.titles{
				font-size: 28px;
				font-family: Tw Cen MT;
			}
			
			.input-style{
				font-size: 18px;
				margin-top: 0px;
				border:2px solid PaleTurquoise;
				border-radius:7px;
				height:30px;
				padding-left: 5px;
			}
			
			.input-style.location{
				width: 170px;
			}
			
			.input-style.submit{
				padding:10px 50px 10px 50px;
				text-align:center;
				background-color: red;
				color: white;
				font-weight: bold;
				height: 60px;
				box-shadow: 1px 1px red;
			}
			
			.input-style.submit:hover{
				box-shadow: 3px 3px 3px red;
			}
			
			.input-style.show{
				width: 100px;
				border-style: none;
				color: red;
				background-color: Lavender;
			}
			
			.cost{
				text-align: center;
				font-size: 24px;
			}
			
			.cost.num{
				color: red;
				font-weight: bold;
			}
			
			.invalidRoom{
				color: red;
				font-size: 24px;
				font-weight: bold;
				text-align: center;
			}
			
			.confirmation_code{
				font-size: 24px;
				font-weight: bold;
				text-align: center;
			}
			
		</style>
	</head>
	<body>  
	
		<!-- Navigation bar -->
		
		<ul>
			<li><a class="logo" href="http://localhost/HotelDemo/home_page/home_page.html" target="_self"><img class="logo" src="logo.jpg" ></a></li>
			<li><a href="http://localhost/HotelDemo/home_page/home_page.html" target="_self">Home</a></li>
			<li><a class="active" href="http://localhost/HotelDemo/rooms/rooms.html" target="_self">Rooms</a></li>
			<li><a href="http://localhost/HotelDemo/dining/dining.html" target="_self">Dining</a></li>
			<li><a href="http://localhost/HotelDemo/nightlife/nightlife.html" target="_self">Nightlife</a></li>
			<li><a href="http://localhost/HotelDemo/entertainment/entertainment.html" target="_self">Entertainment</a></li>
			<li><a href="http://localhost/HotelDemo/meeting/meetings.html">Meetings&Weddings</a></li>
		</ul>
		
		<!-- intro -->
		
		<div><p id="p_welcom" style="margin-bottom:20px;">Classic Single</p><p id="welcom_msg">Classic Single room with one Bed, featuring a dramatic view.</p></div>
		

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
			$sql = "SELECT TODAYPRICE FROM room WHERE CATEGORY = 'Classic Single' LIMIT 1;";
			//use excec() because no results are returned
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$price = $row['TODAYPRICE'];
			
			//sql to select room numbers
			$sql2 = "SELECT `NUMBER` FROM `ROOM` WHERE `CATEGORY` = 'Classic Single' ;";
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

		<div class = "cost"><span>Total cost for <strong class = "cost num"><?php echo ($period + 1);?></strong> nights is: <strong class = "cost num"><?php echo "$".($period + 1)*$price;?></strong></span></div>
		
		<p class = "invalidRoom"><?php echo $message;?></p>
		<p class = "confirmation_code"><?php echo $confMssg;?></p>
		
		
		   <div class="personal-info">
                <pre class="titles">   Guest information                              Billing information</pre>
				<form method="post" action = "classic_single_booking_confirmation.php">
   <pre>   Name*                                      Cridit Card Number* 
   <input class="input-style" type="text" name="name" pattern="[a-zA-Z ]*" required>                    <input class="input-style" type="text" name="cridit" pattern="[0-9]{12}" required>

   E-mail*                                    PIN Code*
   <input class="input-style" type="text" name="email" required>                    <input class="input-style" type="password" name="pin" pattern="[0-9]{4}" required>

   Phone Number*                              Name on card
   <input class="input-style" type="tel" name="phone" pattern="[0-9]{11}" required>                    <input class="input-style" type="text" name="name_on_card" pattern="[a-zA-Z ]*" >
   
   Country*                                   Regestration Code*                         
   <input class="input-style location" type="text" name="country" pattern="[a-zA-Z ]*" required>                         <input class="input-style location" type="text" name="conf" pattern="[0-9]{7}" required>
   
   City*                                       Checkin    Checkout
   <input class="input-style location" type="text" name="city" required>                         <input class="input-style show" type="text" name="checkin" value = <?php echo $dateIn?> readonly > <input class="input-style show" type="text" name="checkout" value = <?php echo $dateOut?> readonly >
   
   Gender*                                     Occupancy  Cost
   <input type="radio" name="gender" value="female">Female<input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="other" required>Other                      <input class="input-style show" type="text" name="occupancy" value = <?php echo $occupancy?> readonly > <input class="input-style show" type="text" name="cost" value = <?php echo ($period + 1)*$price;?> readonly >
   	
	
				
			     <input class="input-style submit" type="submit" name="submit" value="Book" ></pre>
				</form>
			</div>
			
			<!-- Footer -->

		<div class="footer" style="margin:0px -5px 0px -10px;">
		  <p>©2019 Verona Hotel. All rights reserved.</p>
		</div>
	</body>
</html>