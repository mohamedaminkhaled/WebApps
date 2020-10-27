<!DOCTYPE HTML>  
<html>
	<head>			
		<link rel="stylesheet" href="http://localhost/HotelDemo/home_page/main.css">
		<style>
			.error {color: #FF0000;}
			
			body {
				  background-image: url("encore_salone.jpg");
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
			  margin:100px 200px 50px 200px ;
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
		
		<div><p id="p_welcom" style="margin-bottom:20px;">Encor Tower Suite Salon</p><p id="welcom_msg">Unique corner rooms from 28th floor and above showcase view of verona city through floor-to-celing windows.</p></div>
		

		<?php
			// define variables and set to empty values
			$name = $email = $gender = $phone = $cridit  = $pin = $name_on_card = $country = $city = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
		
		    <div class="personal-info">
                <pre class="titles">   Guest information                              Billing information</pre>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
   <pre>   Name*                                      Cridit Card Number* 
   <input class="input-style" type="text" name="name" pattern="[a-zA-Z ]*" value="<?php echo $name;?>">                    <input class="input-style" type="text" name="cridit" pattern="[0-9]{12}" value="<?php echo $cridit;?>">

   E-mail*                                    PIN Code*
   <input class="input-style" type="text" name="email" value="<?php echo $email;?>">                    <input class="input-style" type="password" name="pin" pattern="[0-9]{4}" value="<?php echo $pin;?>">

   Phone Number*                              Name on card
   <input class="input-style" type="tel" name="phone" pattern="[0-9]{11}" value="<?php echo $phone;?>">                    <input class="input-style" type="text" name="name_on_card" pattern="[a-zA-Z ]*" value="<?php echo $name_on_card;?>">
   
   Country
   <input class="input-style location" type="text" name="country" pattern="[a-zA-Z ]*" value="<?php echo $country;?>">
   
   City
   <input class="input-style location" type="text" name="city" value="<?php echo $city;?>">
   
   Gender* 
   <input type="radio" name="gender" value="female">Female<input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="other">Other
   	
	
				
			     <input class="input-style submit" type="submit" name="submit" value="Book"></pre>
				</form>
			</div>
			
			<!-- Footer -->

		<div class="footer" style="margin:0px -5px 0px -10px;">
		  <p>©2019 Verona Hotel. All rights reserved.</p>
		</div>
	</body>
</html>