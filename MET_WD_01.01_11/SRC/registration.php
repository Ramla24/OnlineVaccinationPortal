<?php
  include 'config.php';
  
  if(isset($_POST['submit'])){
	  
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
    $NIC = $_POST['NIC'];
    $DOB = $_POST['DOB'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];
    
	$sql = "insert into register (firstName, lastName, NIC, DOB, gender, email, mobile, address, password, confirmPassword)
	values('$firstName', '$lastName', '$NIC', '$DOB', '$gender', '$email', '$mobile', '$address', '$password', '$confirmPassword')";
	
	$result=mysqli_query($conn, $sql);
	
	if($result){
		echo "Data inserted successfully";
	}
	
	else {
		die("Connection failed: " . $con->connect_error);
	}
  }



?>


<!DOCTYPE html>
<html>
  <head> <title> Innovax </title> 
    <link rel="stylesheet" href="Styles/stylesAmra.css">
	 <script src ="JS/Script.js" defer > </script> 
  </head>
  

  <body>
    <h1><b>Register Yourself Now</b></h1>
    <form name="myForm"action='#'method = "post" onsubmit= "validateForm(); checkPassword();">
      <fieldset class="fieldset">
        <legend><b>Please enter your details below</b></legend>
        <br>
  
        <label for="fname" class="label"><b> First Name : </b></label><br>
        <input class="input" name="firstName" type="text" id="fname" placeholder="Enter your first name here" autofocus><br><br>

        <label for="lname" class="label"><b> Last Name : </b></label><br>
        <input class="input" name="lastName" type="text" id="lastName" placeholder="Enter your last name here"><br><br> 

        <label for="nic" class="label"><b> National Identity Card : </b></label><br>
        <input class="input" name="NIC" type="text" id="NIC" required maxlength="12" placeholder="Enter your NIC here"><br><br> 

        <label for="dob" class="label"><b> Date of Birth : </b></label><br>
        <input class="input" name="DOB" type="date" id="dob" min="1923-01-01" placeholder="Enter your Date of Birth here"><br><br> 
        
        <label for="gender" class="label"><b>
          Gender : </b></label><br>
        <input class="input" name="gender" type="radio" value="MALE">
        <label for="male" class="label">Male</label>
        <input class="input" name="gender" type="radio" value="FEMALE">
        <label for="female" class="label">Female</label><br>

        <label name="Email" for="email" class="label"><b> Email : </b></label><br>
        <input class="input" name="email" type="email" required placeholder="Enter your email here" autocomplete="off"><br><br> 

        <label for="tel" class="label"><b> Mobile Number : </b></label><br>
        <input class="input" name="mobile" type="tel" id="tel"  autocomplete="off"><br><br> 

        <label for="address" class="label"><b> Address : </b></label><br>
        <textarea class="input" name="address" rows="4" cols="50" id="address" style="border:2px solid #000066" placeholder="Enter here"></textarea><br><br>

        <label for="password" class="label"><b> Set Password : </b></label><br>
        <input class="input" name="password" type="password" id="password" required pattern=".{8,}" title="Eight or more characters"><br><br> 

        <label for="confirmPassword" class="label"><b>Confirm Password : </b></label><br>
        <input class="input" name="confirmPassword" type="password" id="password" required pattern=".{8,}" title="Eight or more characters"><br><br><br>
        

       &emsp;&emsp;&emsp; <input type="reset" id="reset" class="button button1" value="RESET">
       &emsp;&emsp;&emsp;<input type="submit" id="confirm" class="button2 button3" value="REGISTER" name="submit" onsubmit="alert('You have submitted the form successfully!')">

       


      </fieldset>
    </form>

  </body>
 </center>
</html>