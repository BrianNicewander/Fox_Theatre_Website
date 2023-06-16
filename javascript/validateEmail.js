 /* <![CDATA[ */
   "use strict";

	// global variables
	var profile = {};
	var formValidity = true

	// validate entered password
	function validateEmail() {
	   var email1Input = document.getElementById("email");
	   var email2Input = document.getElementById("email_retype");
	   email1Input.value = email1Input.value.toLowerCase();
	   email2Input.value = email2Input.value.toLowerCase();
	   var errorDiv = document.getElementById("emailError");
	   try {
			
			if (email1Input.value.localeCompare(email2Input.value) !== 0) {
				throw "The e-mails do not match";
			}
				  // remove any password error styling and message
				  email1Input.style.background = "";
				  email2Input.style.background = "";
				  errorDiv.style.display = "none";
				  errorDiv.innerHTML = "";
				 
			   }
		   catch(msg) {
			  // display error message
			  errorDiv.style.display = "block";
			  errorDiv.innerHTML = msg;
			  // change input style
			  email1Input.style.background = "rgb(255,233,233)";
			  email2Input.style.background = "rgb(255,233,233)";  
			  formValidity = false;    
		   }
	}

	 /* create event listeners */
		function createEventListeners(){
			var form = document.getElementsByTagName("form")[0];
			   if (form.addEventListener){
				   form.addEventListener("submit", validateForm, false);
			   }else if (form.attachEvent) {
				   form.attachEvent("onsubmit", validateForm);
			   }
		   }
	   
	   /* validate form */
	   function validateForm(evt) {
		   if(evt.preventDefault) {
			   evt.preventDefault(); // prevent form from submitting
			}else {
				evt.returnValue = false; // prevent form from submitting in IE8
			}
			formValidity = true; // reset value for revalidation
			validateEmail();
			if (formValidity === true) {
				document.getElementsByTagName("form")[0].submit();
			}
	   }
	   
	    /* run setup functions when page finishes loading */
		if (window.addEventListener) {
			window.addEventListener("load", createEventListeners, false);
		}else if (window.attachEvent) {
			window.attachEvent("onload", createEventListeners);
		}
   /* ]]> */