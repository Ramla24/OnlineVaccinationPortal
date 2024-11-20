<?php

	include 'config.php';
	
	$sql = "DELETE FROM appointments WHERE AppointmentID='" . $_GET["AppointmentID"] . "'";
	
	if (mysqli_query($conn, $sql)) {
		echo "Appointment Cancelled successfully";
	} 
	
	else {
		echo "Error cancelling appointment: " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>