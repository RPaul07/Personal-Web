
<div class="row">
	<div class="col-md-12 col-sm-12">

		<?php
		

		if (!isset($_POST['submit'])) {
			echo '<h2>Please fill out the contact form below.</h2>';
			echo '<form method="post" action="">';

			if(isset($_GET['errMsg'])) {
				$errorList = explode(",", $_GET['errMsg']);
			} else {
				$errorList = array();
			}

			// Helper function to check if a specific error exists
			function hasError($errorList, $errorName) {
				return in_array($errorName, $errorList);
			}

			// FIRST NAME
			echo '<div class="form-group ' . (hasError($errorList, "fnameErrNull") || hasError($errorList, "fnameInvalid") ? 'has-error' : (isset($_SESSION['firstname']) ? 'has-success' : '')) . '" id="firstNameGroup">';
			echo '<label class="control-label" for="firstname">First Name:</label>';
			echo '<input type="text" class="form-control" id="firstname" name="firstname" value="' . (isset($_SESSION['firstname']) ? htmlspecialchars($_SESSION['firstname']) : '') . '">';
			if (hasError($errorList, "fnameErrNull")) {
				echo '<span class="help-block">First name cannot be blank!</span>';
			} elseif (hasError($errorList, "fnameInvalid")) {
				echo '<span class="help-block">First name has invalid characters!</span>';
			}
			echo '</div>';

			// LAST NAME
			echo '<div class="form-group ' . (hasError($errorList, "lnameErrNull") || hasError($errorList, "lnameInvalid") ? 'has-error' : (isset($_SESSION['lastname']) ? 'has-success' : '')) . '" id="lastNameGroup">';
			echo '<label class="control-label" for="lastname">Last Name:</label>';
			echo '<input type="text" class="form-control" id="lastname" name="lastname" value="' . (isset($_SESSION['lastname']) ? htmlspecialchars($_SESSION['lastname']) : '') . '">';
			if (hasError($errorList, "lnameErrNull")) {
				echo '<span class="help-block">Last name cannot be blank!</span>';
			} elseif (hasError($errorList, "lnameInvalid")) {
				echo '<span class="help-block">Last name has invalid characters!</span>';
			}
			echo '</div>';

			// EMAIL
			echo '<div class="form-group ' . (hasError($errorList, "emailErr") ? 'has-error' : (isset($_SESSION['email']) ? 'has-success' : '')) . '" id="emailGroup">';
			echo '<label for="email">Email:</label>';
			echo '<input type="text" class="form-control" id="email" name="email" value="' . (isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '') . '">';
			if (hasError($errorList, "emailErr")) {
				echo '<span class="help-block">Please enter a valid email address!</span>';
			}
			echo '</div>';

			// PHONE
			echo '<div class="form-group ' . (hasError($errorList, "phoneErr") ? 'has-error' : (isset($_SESSION['phone']) ? 'has-success' : '')) . '" id="phoneGroup">';
			echo '<label for="phone">Phone Number:</label>';
			echo '<input type="text" class="form-control" id="phone" name="phone" value="' . (isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : '') . '">';
			if (hasError($errorList, "phoneErr")) {
				echo '<span class="help-block">Phone number must contain digits only!</span>';
			}
			echo '</div>';

			// USERNAME

			echo '<div class="form-group ' . (hasError($errorList, "usernameErrNull") || hasError($errorList, "usernameErrInvalid") ? 'has-error' : (isset($_SESSION['username']) ? 'has-success' : '')) . '" id="usernameGroup">';
			echo '<label for="username">Username:</label>';
			echo '<input type="text" class="form-control" id="username" name="username" value="' . (isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : '') . '">';
			if (hasError($errorList, "usernameErrNull")) {
				echo '<span class="help-block">Username cannot be blank!</span>';
			} elseif (hasError($errorList, "usernameErrInvalid")) {
				echo '<span class="help-block">Username can only contain letters, numbers, and underscores!</span>';
			}
			echo '</div>';


		//    echo '<div class="form-group" id="usernameGroup">';
		//    echo '<label for="username">Username:</label>';
		//    echo '<input type="text" class="form-control" id="username" name="username">';
		//    echo '<span class="help-block" id="usernameStatus"></span>';
		//    echo '</div>';

			// PASSWORD
			echo '<div class="form-group ' . (hasError($errorList, "passwordErr") ? 'has-error' : '') . '" id="passwordGroup">';
			echo '<label for="password">Password:</label>';
			echo '<input type="password" class="form-control" id="password" name="password">';
			if (hasError($errorList, "passwordErr")) {
				echo '<span class="help-block">Password cannot be blank!</span>';
			}
			echo '</div>';

			// COMMENTS
			echo '<div class="form-group ' . (hasError($errorList, "commentsErr") ? 'has-error' : '') . '" id="commentsGroup">';
			echo '<label for="comments">Comments:</label>';
			echo '<textarea class="form-control" id="comments" name="comments">' . (isset($_SESSION['comments']) ? htmlspecialchars($_SESSION['comments']) : '') . '</textarea>';
			if (hasError($errorList, "commentsErr")) {
				echo '<span class="help-block">Comments cannot be blank!</span>';
			}
			echo '</div>';

			echo '<button class="btn btn-success" type="submit" value="submit" name="submit">Submit</button>';
			echo '</form>';
		} else {
			$errors = array();
			$_SESSION = array();

			// FIRST NAME VALIDATION
			$firstname = addslashes($_POST['firstname']);
			if ($firstname == NULL) {
				$errors[] = "fnameErrNull";
			} elseif (!preg_match("/^[a-zA-Z'-]+$/", $firstname)) {
				$errors[] = "fnameInvalid";
			}
			$_SESSION['firstname'] = $firstname;

			// LAST NAME VALIDATION
			$lastname = addslashes($_POST['lastname']);
			if ($lastname == NULL) {
				$errors[] = "lnameErrNull";
			} elseif (!preg_match("/^[a-zA-Z'-]+$/", $lastname)) {
				$errors[] = "lnameInvalid";
			}
			$_SESSION['lastname'] = $lastname;

			// EMAIL VALIDATION
			$email = addslashes($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errors[] = "emailErr";
			}
			$_SESSION['email'] = $email;

			// PHONE VALIDATION
			$phone = addslashes($_POST['phone']);
			if (!ctype_digit($phone)) {
				$errors[] = "phoneErr";
			}
			$_SESSION['phone'] = $phone;


			// USERNAME VALIDATION
			$username = addslashes($_POST['username']);
			if ($username == NULL) {
				$errors[] = "usernameErrNull";
			} elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
				$errors[] = "usernameErrInvalid";
			}
			$_SESSION['username'] = $username;


			// PASSWORD VALIDATION
			$password = addslashes($_POST['password']);
			if ($password == NULL) {
				$errors[] = "passwordErr";
			}

			// COMMENTS VALIDATION
			$comments = addslashes($_POST['comments']);
			if ($comments == NULL) {
				$errors[] = "commentsErr";
			}
			$_SESSION['comments'] = $comments;

			if (!empty($errors)) {
				$errorString = implode(",", $errors);
				header("Location: contact.php?errMsg=$errorString");
				exit();
			}

			// IF NO ERRORS, DISPLAY DATA
			echo '<h2>Form Data:</h2>';
			echo '<h2>First Name: ' . htmlspecialchars($firstname) . '</h2>';
			echo '<h2>Last Name: ' . htmlspecialchars($lastname) . '</h2>';
			echo '<h2>Email: ' . htmlspecialchars($email) . '</h2>';
			echo '<h2>Phone Number: ' . htmlspecialchars($phone) . '</h2>';
			echo '<h2>Username: ' . htmlspecialchars($_POST['username']) . '</h2>';
			echo '<h2>Password: ' . htmlspecialchars($password) . '</h2>';
			echo '<h2>Comments: ' . nl2br(htmlspecialchars($comments)) . '</h2>';
			
			//DB connection
			
			$dblink=db_connect("contact_data");
			
			
			$sql="Insert into `contact_info`
			(`first_name`,`last_name`,`email`,`phone`,`user_name`,`password`,`comments`)Values
			('$firstname','$lastname','$email','$phone','$username','$password','$comments')";
			$result=$dblink->query($sql) or
				die("<h2>Something went wrong with: $sql<br>".$dblink->error."</h2>");
			echo '<h2>Data successfully saved to database! </h2>';
		}	
		?>

	</div>
</div>
    