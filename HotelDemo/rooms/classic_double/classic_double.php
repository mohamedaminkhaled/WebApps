<DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="http://localhost/HotelDemo/home_page/main.css">
		<style>
			body {
				  background-image: url("classic_double.jpg");
				  background-repeat: no-repeat;
				  background-position: 0 68;
				  background-attachment: scroll;
				  background-size: 100% 400px;
				}
			
			.active{
				color:DarkGoldenRod;
			}
			
			#check_availability{
				font-size:18px;
				margin-top:50px;
				margin-bottom:100px;
				margin-left: 15%;
				border: 2px solid Fuchsia;
				width: 70%;
				box-shadow: 5px 5px 10px Fuchsia;
			}
			
			.input-style{
				font-size:18px;
				border: 1px solid Fuchsia; 
				padding:5px;
				width:170px;
				border-radius: 3px;
			}
			
			.input-style.occupancy{
				width:80px;
				font-size:20px;
			}
			
			.input-style.booking{
				border: 2px solid Fuchsia; 
				padding:15px 30px 15px 30px; 
				width:220px;
				font-size: 18px;
				font-weight: bold;
				box-shadow: 1px 1px 3px Fuchsia;
			}
			
			.input-style.booking:hover{
				box-shadow: 3px 3px 5px Fuchsia;
			}
			
			.todayPrice{
				font-size: 24px;
				text-align: center;
			}
			
			.todayPrice.value{
				color: red;
			}
			
		</style>
	</head>
	<body>

		<ul>
			<li><a class="logo" href="http://localhost/HotelDemo/home_page/home_page.html" target="_self"><img class="logo" src="logo.jpg"></a></li>
			<li><a href="http://localhost/HotelDemo/home_page/home_page.html" target="_self">Home</a></li>
			<li><a class="active" href="D:\courses\software engineering\Web\Projects\HotelDemo\rooms\rooms.html" target="_self">Rooms</a></li>
			<li><a href="D:\courses\software engineering\Web\Projects\HotelDemo\dining\dining.html" target="_self">Dining</a></li>
			<li><a href="D:\courses\software engineering\Web\Projects\HotelDemo\nightlife\nightlife.html" target="_self">Nightlife</a></li>
			<li><a href="D:\courses\software engineering\Web\Projects\HotelDemo\entertainment\entertainment.html" target="_self">Entertainment</a></li>
			<li><a href="D:\courses\software engineering\Web\Projects\HotelDemo\meeting\meetings.html">Meetings&Weddings</a></li>
		</ul>
		
		<!-- intro -->
		
		<div><p id="p_welcom" style="margin-bottom:20px;">Classic Double</p><p id="welcom_msg">Classic Double With One double bed anchor the 650-square-foot resort room living and dining furnishing evoke luxury living.</p></div>
				
			<?php
				$serverName = "localhost";
				$userName = "root";
				$password = "";
				$dbName = "hoteldb";
			
				//create connection
				$conn = new mysqli($serverName, $userName, $password, $dbName);
				//sql to select data
				$sql = "SELECT TODAYPRICE FROM room WHERE CATEGORY = 'Classic Double' LIMIT 1;";
				//use excec() because no results are returned
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();			
			?>
		
		<div class = "todayPrice">
			<span>Best Available Rate:
				<strong class = "todayPrice value"> <?php echo "$",$row['TODAYPRICE'];?></strong></p>
			</span>
		</div>
		
		<div id="check_availability">
		
		<form method="post" action="classic_double_booking.php">
<pre>  Checkin*           Checkout*          Occupancy*
  <input class="input-style" type="date" name="chickin" required>  <input class="input-style" type="date" name="checkout" required>  <input class="input-style occupancy" type="number" name="occupancy"  min="1" max="2" required>         <input class="input-style booking" type="submit" value="Check Availability">
  </pre>
</form>
		</div>
		
		<!-- Footer -->

		<div class="footer">
		  <p>©2019 Verona Hotel. All rights reserved.</p>
		</div>
		
	</body>
</html>