<?php
include 'config.php';

// Retrieve the appointment details from the database
$query = "SELECT * FROM appointments ORDER BY AppointmentID ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
     <title> Innovax </title> <!--Page Title-->
	 <link rel="icon" type="image/x-icon" href="Images/Logo.PNG"> <!--Page Favicon-->
	 <link rel= "stylesheet" href = "Styles/stylesheetRamla.css"> <!--Link style sheet (CSS)-->
	 	  <script src ="JS/Script.js" defer > </script> 
</head>
<body>

<div class="main">
<div class="header">
<a href = "index.html"><img id = "Logo" src="Images/Logo.PNG"  alt= "logo"></a>
<h1 class ="mainheading"><a href = "index.html">Innovax</a></h1> 

<button class="mainbtn" ><a href="login.html" >Log in</a> </button>
<button class="mainbtn" >Sign Up</button>
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
        <div class="appointmentdetails">
            <h2>Appointment Details</h2>
            <table>
			<tr>
                    <td>Appointment ID:</td>
                    <td><?php echo $row['AppointmentID']; ?></td>
                </tr>
                <tr>
                    <td>Patient's Age:</td>
                    <td><?php echo $row['Age']; ?></td>
                </tr>
                <tr>
                    <td>Is the patient pregnant?</td>
                    <td><?php echo $row['Pregnant'] ? 'Yes' : 'No'; ?></td>
                </tr>
                <tr>
                    <td>Appointment Date:</td>
                    <td><?php echo $row['Appointment_date']; ?></td>
                </tr>
                <tr>
                    <td>Appointment Time:</td>
                    <td><?php echo $row['Appointment_time']; ?></td>
                </tr>
                <tr>
                    <td>Vaccination Center:</td>
                    <td><?php echo $row['Vaccination_center']; ?></td>
                </tr>
                <tr>
                    <td>Vaccines:</td>
                    <td><?php echo $row['Vaccines']; ?></td>
                </tr>
                <tr>
                    <td>Any Requests:</td>
                    <td><?php echo $row['Any_requests']; ?></td>
                </tr>
            </table>
        </div>
    </div>
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
<?php
} else {
    echo "No appointment details found.";
}
mysqli_close($conn);
?>