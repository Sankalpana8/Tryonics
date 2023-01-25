// JavaScript Document
function validations()
{
	var x = document.getElementById('phone').value;
	var userInput = document.getElementById('name').value;
	var userInputA = document.getElementById('about').value;
	
	var flag =0;
	//validation for Name field
	if(document.getElementById('name').value=="")
	{
		setTimeout(function () { swal("Name Can't Be Blank","Warning!","warning");
 		 }, 5);
		 flag = 1;
	}
	else if((userInput.length <= 50 && userInput.length >= 3)==false)
    {  	
       setTimeout(function () { swal("Name Length Should Be In Between Maximum 50 And Minimum 5 Characters","Warning!","warning");
 	    }, 5);
		flag = 1;  	
    }	 
	else if(isNaN(document.getElementById('name').value)==false)
	{
		setTimeout(function () { swal("Name Cannot Be Numeric","Warning!","warning");
 		 }, 5);
		 flag = 1;
	}
	//validation for About field
	else if(document.getElementById('about').value=="")
	{
		setTimeout(function () { swal("About information Can't Be Blank","Warning!","warning");
 		 }, 5);
		 flag = 1;
	}
	else if((userInputA.length <= 500 && userInputA.length >= 10)==false)
      {  	
       setTimeout(function () { swal("Your About Length Should Be In Between Maximum 500 And Minimum 10 Characters","Warning!","warning");
 	    }, 5);
		flag = 1;  	
      }
	  else if(isNaN(document.getElementById('about').value)==false)
	  {
		  setTimeout(function () { swal("About information Cannot Be Numeric","Warning!","warning");
			}, 5);
		   flag = 1;
	  }
	  //validation for Birthday field
	else if(document.getElementById('dob').value=="")
	{
		setTimeout(function () { swal("Please select your Birthday","Warning!","warning");
 		 }, 5);
		 flag = 1;
	}
	//validation for Mobile Number field
	else if(document.getElementById('phone').value=="")
	{
		setTimeout(function () { swal("Mobile Number Can't Be Blank","Warning!","warning");
 		 }, 5);
		 flag = 1;
	}
	else if (x.length != 10)
    {                	
		setTimeout(function () { swal("Mobile number should Have 10 numbers","Warning!","warning");
 	    }, 5);
		flag = 1;
    }
	else if(isNaN(document.getElementById('phone').value)==true)
	{
		
		setTimeout(function () { swal("Mobile Number Should Be Numeric","Warning!","warning");
 	    }, 5);
		flag = 1;
	}
	//validation for Country field	
	else if(document.getElementById('country').value=="s")
	{
		setTimeout(function () { swal("Please Select Your Country","Warning!","warning");
 		 }, 5);
		 flag = 1;
	}
	//validation for Email field
	else if(document.getElementById('email').value=="")
	{
		setTimeout(function () { swal("Email Can't Be Blank","Warning!","warning");
 		 }, 5);
		 flag = 1;
	}
	//if no need validations then submit form
	else if(flag == 0)
	{
		document.getElementById('f1').submit();
	}
}