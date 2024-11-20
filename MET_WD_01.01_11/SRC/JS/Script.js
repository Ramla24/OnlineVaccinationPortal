function validateAppointment(event)
{
	const form = document.getElementById("appointmentForm");

	
	//Validate Appointment Date.
	const appoindate = document.getElementById("date").value;
	
	const currentDate = new Date();
	const selectedDate = new Date(appoindate);
	
	if(selectedDate < currentDate )
	{
		alert("Date Invalid : Please select a date in the future.");
		event.preventDefault();
		return false;
	}
	
	//Validate Appointment time
	 const appointime = document.getElementById("time").value;
	
	if (appointime < "09.00" || appointime > "17.00")
	 {
		 alert("Time Invalid : Please select a time between 09.00 AM and 5.00 PM.");
		 event.preventDefault();
		 return false;
	 }
	
	 // //Validate Vaccine selection.
	  const vaccineCheckboxes = document.querySelectorAll('input[type="checkbox"][name="vaccine[]"]');
	   const unsafeVaccines = ['HPV', 'MMR', 'Flu', 'Chicken Pox'];
	   const cov = ["Covid-19"];
	 
	  var yescov =0;
	  var noofunsafe =0;
	  var noOfselectedcheckbox = 0;
	
	  for(var i = 0; i <vaccineCheckboxes.length; i++)
	  {
		  var checkbox = vaccineCheckboxes[i];
		  if(checkbox.checked)
		  {
			  noOfselectedcheckbox++;
			  if(unsafeVaccines.includes(checkbox.value))
			  {
				  noofunsafe++;
			  }
			  if(cov.includes(checkbox.value))
			  {
				  yescov++;
			  }
		  }
		
	  }
	   
	     if (noOfselectedcheckbox === 0)
	     {
		     alert("No vaccine has been selected : Please select atleast 1 vaccine");
		     event.preventDefault();
		     return false;
	     }
	     else if (noOfselectedcheckbox > 2)
	     {
		     alert("You can select only up to 2 vaccines per appointment.");
		     event.preventDefault();
		     return false;
	     }
	   
	     const isPregnant = document.querySelector('input[name="pregnant"]:checked').value === "1";
	     if (isPregnant &&  noofunsafe> 0) {
      
          const shouldProceed = confirm("You have chosen one or more of the following vaccines to avoid during pregnancy: HPV, MMR, Flu, Chicken Pox. Are you sure you want to proceed?");
          if (!shouldProceed) {
			  event.preventDefault();
        return false;
      }
    }
  
    if (noOfselectedcheckbox === 1 && yescov===1)
    {
	 
        const AddPneumoniaVaccine = confirm("Pneumonia vaccine is usually recommended alongside the Covid-19 vaccine. Do you want to add the Pneumonia vaccine?");
	  
	    if (AddPneumoniaVaccine) 
    {
       const pneumoniaCheckbox = document.querySelector('input[value="Pneumonia"]');
       pneumoniaCheckbox.checked = true;
    }
  }
 return true;
}
 
 
 function validateForm() {
  let x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}

function checkPassword() {
    // get passwords from the field using their name attribute
    const password = form.password.value;
    const confirmPassword = form.confirmPassword.value;

    // check if both match using if-else condition
    if (password != confirmPassword) {
      alert("Error! Password did not match.");
      return false;
    } else {
      alert("Password Match. Congratulations!");
      return true;
    }
  }
  
      function validatelogin() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }