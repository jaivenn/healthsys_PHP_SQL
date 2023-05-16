<?php
session_start();
// Include the connection.php file
include "connection.php";

$message = '';

if (isset($_POST['send_walkin'])) {
   $fullName = $_POST['full_name'];
   $dateToday = $_POST['date_today'];
   $msg = $_POST['message'];
   $username = $_POST['username'];

   // Update the walk-in request details in the users table
   $query = "INSERT INTO walkin (full_name, date_today, message, user_name) 
             VALUES (:full_name, :date_today, :message, :username)";
   // Make sure that $con is not null before preparing the statement
   if ($con) {
     $stmt = $con->prepare($query);
     $stmt->bindParam(':full_name', $fullName);
     $stmt->bindParam(':date_today', $dateToday);
     $stmt->bindParam(':message', $msg);
     $stmt->bindParam(':username', $username);

     if ($stmt->execute()) {
      $message = 'Walk-in request sent successfully.';
      echo '<script>alert("Walk-in request sent successfully. Click Ok to proceed.");</script>';
   } else {
      $message = 'Error occurred while sending the walk-in request.';
   }
}
}
?>



<html>
<head>
<title>PatientView - Walk In Form</title>

<style>
ul{
list-style-type:none;
}

html, body{
height:100%;
font-family: 'Arial';
border: none;
}

/* Rectangle 3 - Side Bar Background */

#SideBarBG{
position: absolute;
width: 298px;
min-height: 100%;
left:0px;
top: 0px;
bottom:0px;
background: yellow;
}
/* Group 1 - Side Bar Hyperlink Nav Container */

#SideBarNavCon{
position: absolute;
right:0px;
top: 75%;
width:100%;
}

/*Side Bar Hyperlink CSS*/
li .sideBarLink{
    display:block;
	color:#02075d;
	font-size: 25px;
	background: yellow;
	border:none;
	text-decoration:none;
	padding:10px;
	width:100%;
	right:30px;
	
}
li .sideBarLink:hover{
    background-color:#4045a3;
	color:white;
	padding:10px;
	
}

/*Rectangle 5 - Text Box Field Container */
#TextBoxContainer{
position: absolute;
width: 68%;
height: 72%;
left: 24%;
top: 21%;
padding: 15px;
background: #02075d;
color: white;
}
/* Rectangle 10 - Message Box */

#Msg{
position: absolute;
width: 700px;
height: 270px;
left: 25%;
top:  42.4%; 

background: #FFFFFF;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 20px;
border: none;
font-size:15px;
padding:7px;
}
/* Rectangle 9 - Date Today Box */

#Date{
position: absolute;
width: 700px;
height: 55px;
left: 25%;
top: 27%;

background: #FFFFFF;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 20px;
border: none;
font-size:24px;
padding:7px;
}

/* Rectangle 6 - FullName TextBox */

#FullName{
position: absolute;
width: 700px;
height: 55px;
left: 25%;
top: 12%;

background: #FFFFFF;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 20px;
border: none;

font-size:24px;
padding:7px;
}

/* Rectangle 25 - Send WalkIn Button*/

input.SendButton{
position: absolute;
width: 550px;
height: 50px;
left: 26%;
top: 94%;

background: #4BCF49;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 50px;
border: none;

font-style: normal;
font-weight: 400;
font-size: 20px;
line-height: 30px;

color: #FFFFFF;
}
input.SendButton:hover{
background: #43b541;
}

input.SendButton:active{
background: #379136;
}
/*
notes:
April 21, 2023 - Basically re-edit lang nung patient view request form

*/
</style>
</head>
<body>

<p style="position: absolute; font-size: 40px; left: 25%; font-weight:bold; color: #140748;">Send A Walk-in Request Form</p>
<p style="position: absolute; font-size: 17px; left: 25%; top:75px; color:gray;"><i>Usually instructed by the admin or the staff in the clinic</i></p>
<br>

<p style="position: absolute; font-size: 17px; left: 25%; top:100px; color:gray; "><i>Disclosure: This is only for tracking the applicant's track record for walk-in</i></p>

<div id ="SideBarBG">
<center><img src ="./assets/images/logobrgy.png" style="width:200px; height:200px;"></center>

<ul id="sideBarNavCon">
<li style="  background-color:#02075d; font-size: 25px; color:white; padding:10px;">Walk-In</li>

<li><a class="sideBarLink" href="z_WIview.php">Walk-In Request</a></li>

<li><a class="sideBarLink" href="z_user.PHP">Center Homepage</a></li>

<li><a class="sideBarLink" href="dummy">Mapulang Lupa HP</a></li>
</ul>

</div>

<div id="TextBoxContainer">
<form method="post" action="z_WI.php">
   <h1 style="position: absolute; top: 12%;">Full Name</h1>
   <input type="text" name="full_name" id="FullName">

   <h1 style="position: absolute; top: 27%;">Date Today</h1>
   <input type="date" name="date_today" id="Date">

   <h1 style="position: absolute; top: 42.4%;">Message</h1>
   <textarea name="message" id="Msg"></textarea>

   <input type="hidden" name="username" value="<?php echo $_SESSION['user_name']; ?>">
   <input type="submit" name="send_walkin" class="SendButton" value="Send Walk In Request">
</form>

</div>






</body>
</html>