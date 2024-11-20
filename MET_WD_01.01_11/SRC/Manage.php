<?php
	include_once 'config.php';
	
	$result = mysqli_query($conn,"SELECT * FROM appointments");
?>

<!DOCTYPE html>
<html>
 <head>
 <title> Manage Appointment</title>
  <link rel="icon" type="image/x-icon" href="Images/Logo.PNG"> <!--Page Favicon-->
	 <link rel= "stylesheet" href = "Styles/stylesheetRamla.css"> <!--Link style sheet (CSS)-->
	
</head>
<body>
<div class="main">
<div class="header">
<a href = "index.html"><img id = "Logo" src="Images/Logo.PNG"  alt= "logo"></a>
<h1 class ="mainheading"><a href = "index.html">Innovax</a></h1> 

<button class="mainbtn" ><a href="login.php" >Log in</a> </button>
<button class="mainbtn" ><a href="registration.php" >Sign Up</a></button>
</div>


<ul class = "nav-items">
 
     
    <li><a class = "design1"  href = "index.html">Home </a> </li>
	<li><a class = "design1" href = "location.html"> Our Locations</a> </li>
	<li><a class = "design1" href = "News.html">News and Updates </a></li>
	<li><a class = "design1" href = "faq.html">FAQ's </a></li>
	<li><a class = "design1" href = "contact.html">Contact Us </a></li>
	<li><a class = "design1" href = "about.html"> About </a> </li>
	<form id="search-form">
    <input type="text" id="search-input" placeholder="Search...">
    <button type="submit" id="search-submit"><img id="searchicon" src="Images/search.png"></button>
    </form>
</ul>	
	</div>
 
 <style> 
			
.appointmenttable {
      width: 100%;
      border-collapse: collapse;
    }
    
    .appointmenttable th,
    .appointmenttable td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    .appointmenttable th {
      background-color: #f2f2f2;
      color: #333;
    }
    
   
	button
	{
	  padding: 6px 12px;
      background-color: #004AAD;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
	}
	button:hover{
		background-color: gray;
	}
 </style>
 </head>
 
<body>

	<?php
		if (mysqli_num_rows($result) > 0) {
	?>
	
	<h2>My Appoinments</h2>
	<p> Appointments can be rescheduled and cancelled. 1 for the preganant column represents patient is pregnant and 0 represents not pregnants</p>
  <button ><a class = "btn"  href = "schedule.html" > New Appointment </a></button>
	
  <table class="appointmenttable">
  
	  <tr>
    <th>Appointment ID</th>
	<th>Age</th>
	<th>Pregnant</th>
	<th>Appointmnet Date</th>
	<th>Appointment Time</th>
	<th>Vaccination Center</th>
	<th>Vaccines</th>
	<th>Special Requests</th>
  </tr>
	  
	<?php
		$i=0;
		while($row = mysqli_fetch_array($result)) {
	?>
	
	<tr>
		<td><?php echo $row["AppointmentID"]; ?></td>
		<td><?php echo $row["Age"]; ?></td>
		<td><?php echo $row["Pregnant"]; ?></td>
		<td><?php echo $row["Appointment_date"]; ?></td>
		<td><?php echo $row["Appointment_time"]; ?></td>
		<td><?php echo $row["Vaccination_center"]; ?></td>
		<td><?php echo $row["Vaccines"]; ?></td>
		<td><?php echo $row["Any_requests"]; ?></td>
		
		<div class="btn">
		<td><a href="editappointment.php?AppointmentID=<?php echo $row["AppointmentID"];?>"><button type="button">Edit Appointment</button></a></td>
		
		<td><a href="cancelappointment.php?AppointmentID=<?php echo $row["AppointmentID"]; ?>"><button type="button">Cancel Appointment</a></td>
        </div>
	</tr>
	
	<?php
	$i++;
	}
	?>
	
	</table>
	
	
	
	<?php
		}
		
	else{
		echo "No result found";
	}
	?>
 </body>
 <footer>
<div class="footer">
  <div class="contain">
  <div class="col">
    <h2>Contact</h2>
    <ul>
      <li> <img class="icon" src="Images/phone.png">+94 11 2879324</li>
      <li> <img class="icon" src="Images/email.png">innovax@gmail.com</li>
      <li> <img class="icon" src="Images/location.png">No.55, Deals Place, Bambalapitiya, Colombo, Sri-Lanka</li>
    </ul>
  </div>
  <div class="col">
    <h2>Innovax</h2>
    <ul>
       <li><a   href = "index.html">Home </a> </li>
	<li><a  href = "loction.html"> Our Locations</a> </li>
	<li><a  href = "News.html">News and Updates </a></li>
	<li><a  href = "faq.html">FAQ's </a></li>
	<li><a  href = "contact.html">Contact Us </a></li>
	<li><a  href = "about.html"> About </a> </li>
    </ul>
  </div>
  <div class="col">
    <h2>Our Services</h2>
    <ul>
    <li><a href = "schedule.html" > Schedule Appointment</a> </li>
	<li><a href = "Manage.html" >Manage Appointment</a></li>
	<li><a href = "vaccineinfo.html">Vaccine Information</a></li>
	<li><a href = "certificate.html">Vaccine Certificate </a></li>

    </ul>
  </div>
  <div class="col">
    <h2>Follow Us On</h2>
    <ul>
      <li><a href="https://www.facebook.com/"><img class="icon" src="Images/facebook.png"></a></li>
      <li><a href="https://www.instagram.com/"> <img class="icon" src="Images/instagram.png"></a></li>
      <li><a href="https://twitter.com/"> <img class="icon" src="Images/twitter.png"></a></li>
    </ul>
  </div>
  
</div>
<div class="bottom">
<h5><a href = "terms.html" >Terms and Conditions </a></h5>
<h5>| </h5>
<h5><a href = "priv.html" >Privacy Policy</a></h5>
</div> 
</div>

</footer>
</html>