/* change style for the paragraph with id='content'
  change the original color color */
function setColor(color){
	document.getElementById("content").style.color = color;
	
	var months = ["January", "February", "Mrch", "April", "May",
		"June", "July", "August", "September", "October", "November",
		"December"];
	
	var date = new Date();
	document.getElementById("date").innerHTML = 
		months[date.getMonth()]+ "-" + date.getDate() + "-" + 
		date.getFullYear() + "  " + date.getHours() + ":" +
		date.getMinutes() + ":" + date.getSeconds();
		
	document.getElementById(date).style.color = "lightgrey";
}

//return the original color
function originColor(originColor){
	document.getElementById('content').style.color = originColor;
	
	//hide the date
	document.getElementById("date").innerHTML = "";
}

//get the original color of paragraph
const ORIGINCOLOR = document.getElementById("content").style.color;
const HEADCOLOR = document.getElementById("header").style.color;

//define the width of the header
document.getElementById("header").style.width = "100px";

//change the original color
function changeColor(newColor){
	document.getElementById("header").style.color = newColor;
}
			
//return the old color
function oldColor(){
	document.getElementById("header").style.color = "red";
	document.getElementByid("header").firstLeter.
			 style.color = "black";
}	

//Show current date and time
