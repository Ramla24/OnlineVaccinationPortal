<?php
	include 'config.php';
	
	if (count($_POST) > 0) {
		$appointmentID = $_POST['AppointmentID'];
		$age = $_POST['age'];
		$pregnant = $_POST['pregnant'];
		$appointmentDate = $_POST['date'];
		$appointmentTime = $_POST['time'];
		$vaccinationCenter = $_POST['center'];
		$vaccines = implode(',', $_POST['vaccine']);
		$anyRequests = $_POST['message'];
		
		mysqli_query($conn, "UPDATE appointments
			SET Age = '$age', Pregnant = '$pregnant', `Appointment_date` = '$appointmentDate',
			`Appointment_time` = '$appointmentTime', Vaccination_center = '$vaccinationCenter',
			Vaccines = '$vaccines', `Any_requests` = '$anyRequests'
			WHERE AppointmentID = '$appointmentID'");
		  
		$message = "Appointmentd Modified Successfully";

	}
	
	$result = mysqli_query($conn, "SELECT * FROM appointments WHERE AppointmentID = '" . $_GET['AppointmentID'] . "'");
	$row = mysqli_fetch_array($result);
?>

<html>
<head>
<title>Edit Appointment</title>
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
		<style>
</style>
	<form class ="formdesign" method="post" action="" onsubmit="return validateAppointment(event)">

		
		<div style="padding-bottom:5px;">
			<a href="Manage.php">My Appointments</a>
			
			<p>The message after the modification whether or not was a success will be shown below the form</p>
		</div>
		
		Appointment ID: 
			
			<input type="text" name="AppointmentID"  value="<?php echo $row['AppointmentID']; ?>">
			<br><br>
		
		 Patient's Age:
     <input type="number" name="age" id="age" required min="0" value="<?php echo $row['Age']; ?>"> <br><br>
	 
	 Is the patient pregnant?
     <input type="radio" name="pregnant" required value="Yes" <?php if ($row['Pregnant'] === '1') echo 'checked'; ?>> Yes
		<input type="radio" name="pregnant" required value="No" <?php if ($row['Pregnant'] === '0') echo 'checked'; ?>> No<br><br>
      Appointment Date :
      <input type="date" name="date" id="date" required value="<?php echo $row['Appointment_date']; ?>"> <br><br>

      Appointment Time :
      <input type="time" name="time" id="time"required value="<?php echo $row['Appointment_time']; ?>"> <br><br>

     Vaccination Center : 
      <select id="center" name="center" required >
        <option disabled selected value=""></option>
        <option <?php if ($row['Vaccination_center'] === 'City Hospital, Colpetty') echo 'selected'; ?>>City Hospital, Colpetty</option>
         <option <?php if ($row['Vaccination_center'] === 'Durdens Hospital, Bambalapity') echo 'selected'; ?>>Durdens Hospital, Bambalapity</option>
         <option <?php if ($row['Vaccination_center'] === 'Lanka Hospital, Narahenpita') echo 'selected'; ?>>Lanka Hospital, Narahenpita</option>
         <option <?php if ($row['Vaccination_center'] === 'Nawaloka Hospital, Colombo-02') echo 'selected'; ?>>Nawaloka Hospital, Colombo-02</option>
         <option <?php if ($row['Vaccination_center'] === 'Suwasiri Hospital, Kandy') echo 'selected'; ?>>Suwasiri Hospital, Kandy</option>
         <option <?php if ($row['Vaccination_center'] === 'Sethma Hospital, Gampaha') echo 'selected'; ?>>Sethma Hospital, Gampaha</option>
         <option <?php if ($row['Vaccination_center'] === 'Ninewells Hospital, Narahenpita') echo 'selected'; ?>>Ninewells Hospital, Narahenpita</option>
         <option <?php if ($row['Vaccination_center'] === 'Delmon Hospital, Wellewatta') echo 'selected'; ?>> Delmon Hospital, Wellewatta</option>
         <option <?php if ($row['Vaccination_center'] === 'Hemas Hospital, Wattala') echo 'selected'; ?>>Hemas Hospital, Wattala</option>
         <option <?php if ($row['Vaccination_center'] === 'Arya Hospital, Ratnapura') echo 'selected'; ?>>Arya Hospital, Ratnapura</option>
         <option <?php if ($row['Vaccination_center'] === 'Asiri Hospital, Matara') echo 'selected'; ?>>Asiri Hospital, Matara</option>
         <option <?php if ($row['Vaccination_center'] === 'Asiri Central Hospital, Borella') echo 'selected'; ?>>Asiri Central Hospital, Borella</option>
         <option <?php if ($row['Vaccination_center'] === 'Ceymed Hospital, Trincomalee') echo 'selected'; ?>>Ceymed Hospital, Trincomalee</option>        
      </select> <br> <br>

      Vaccines (Select upto 2 vaccines) :
      
  <input type="checkbox" name="vaccine[]" value="Covid-19" <?php if (in_array('Covid-19', explode(',', $row['Vaccines']))) echo 'checked'; ?>> Covid-19<br>
		<input type="checkbox" name="vaccine[]" value="Polio" <?php if (in_array('Polio', explode(',', $row['Vaccines']))) echo 'checked'; ?>> Polio<br>
		<input type="checkbox" name="vaccine[]" value="Typhoid" <?php if (in_array('Typhoid', explode(',', $row['Vaccines']))) echo 'checked'; ?>> Typhoid<br>
		<input type="checkbox" name="vaccine[]" value="Tetanus" <?php if (in_array('Tetanus', explode(',', $row['Vaccines']))) echo 'checked'; ?>> Tetanus<br>
		<input type="checkbox" name="vaccine[]" value="Hepatitis" <?php if (in_array('Hepatitis', explode(',', $row['Vaccines']))) echo 'checked'; ?>> Hepatitis<br>
		<input type="checkbox" name="vaccine[]" value="Pneumonia" <?php if (in_array('Pneumonia', explode(',', $row['Vaccines']))) echo 'checked'; ?>> Pneumonia<br>
		<input type="checkbox" name="vaccine[]" value="Rabies" <?php if (in_array('Rabies', explode(',', $row['Vaccines']))) echo 'checked'; ?>>Rabies<br>
		<input type="checkbox" name="vaccine[]" value="Yellow Fever" <?php if (in_array('Yellow Fever', explode(',', $row['Vaccines']))) echo 'checked'; ?>> Yellow Fever<br>
		<input type="checkbox" name="vaccine[]" value="MMR" <?php if (in_array('MMR', explode(',', $row['Vaccines']))) echo 'checked'; ?>> MMR<br>
		<input type="checkbox" name="vaccine[]" value="TDap" <?php if (in_array('TDap', explode(',', $row['Vaccines']))) echo 'checked'; ?>> TDap<br>
		<input type="checkbox" name="vaccine[]" value="Flu" <?php if (in_array('Flu', explode(',', $row['Vaccines']))) echo 'checked'; ?>> Flu<br>
		<input type="checkbox" name="vaccine[]" value="Chicken Pox" <?php if (in_array('Chicken Pox', explode(',', $row['Vaccines']))) echo 'checked'; ?>> Chicken Pox<br>
		<input type="checkbox" name="vaccine[]" value="HPV" <?php if (in_array('HPV', explode(',', $row['Vaccines']))) echo 'checked'; ?>> HPV<br>
		

       <br><br>
      Any Requests :
       <textarea rows="20" columns="6" id="message" name="message" value="<?php echo $row['Any_requests']; ?>"></textarea><br><br><br>

       <input type = "checkbox" value ="Agree" name ="terms" required> Yes, I Agree with the <a href="termsofuse.html">terms of use </a>of Innovax.<br><br><br>
      
		<input type="submit" name="submit" value="UPDATE" class="buttom">

	</form>
			<div>
			<?php if(isset($message)) { echo $message; } ?>
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
      