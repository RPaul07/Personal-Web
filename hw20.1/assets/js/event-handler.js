function checkUsername()
{ // Declare function
	var elMsg = document.getElementById('userfeedback'); // Get feedback element
	var elUsername = document.getElementById('username'); // Get username input
	if (elUsername.value.length < 5)
	{ // If username too short
			elMsg.innerHTML = 'Username must be 5 characters or more'; // Set msg
			console.log("Username character entered: "+elUsername.value.length); // Debug
	}
	else
	{ // Otherwise
		elMsg.innerHTML = ''; // Clear message
	}
}


function checkPassword()
{ // Declare function
	var elMsg = document.getElementById('passfeedback'); // Get feedback element
	var elPassword = document.getElementById('password'); // Get username input
	if (elPassword.value.length < 8)
	{ // If username too short
			elMsg.innerHTML = 'Password must be 8 characters or more'; // Set msg
			console.log("Password character entered: "+elPassword.value.length); // Debug
	}
	else
	{ // Otherwise
		elMsg.innerHTML = ''; // Clear message
	}
}