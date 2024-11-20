<?php
include 'config.php';

echo file_get_contents("schedule.html");
$age = $_POST['age'];
$pregnant = $_POST['pregnant'];
$date = $_POST['date'];
$time = $_POST['time'];
$center = $_POST['center'];
$vaccine = $_POST['vaccine'];
$Vac = implode(',', $vaccine);
$message = $_POST['message'];


  {    
	  $insert = "INSERT INTO appointments (Age,Pregnant,Appointment_date,	Appointment_time,	Vaccination_center,	Vaccines,	Any_requests) VALUES ('$age', '$pregnant', '$date', '$time', '$center','$Vac', '$message')";
      
  }
  
  if (mysqli_query($conn, $insert)) {
    mysqli_close($conn);
    
    
    echo '<script>window.location.href = "appointment_success.php";</script>';
    exit;
} else {
    echo "Error creating appointment: " . mysqli_error($conn);
}
 $conn->close();

?>