<?php 

if(isLoggedIn()){
	header('Location:'.$_SESSION['previousPage']);
}

// Creating an array with empty values for the signup page fields
$fieldValues = [
	'fieldFirstname' => '',
	'fieldLastname' => '',
	'fieldEmail' => '',
	'fieldPhone' => ''
];

// Giving the value to the fields after the form is submitted
if(!empty($_POST['firstname'])){ $fieldValues['fieldFirstname'] = $_POST['firstname']; }
if(!empty($_POST['lastname'])){ $fieldValues['fieldLastname'] = $_POST['lastname']; }
if(!empty($_POST['email'])){ $fieldValues['fieldEmail'] = $_POST['email']; }
if(!empty($_POST['phone'])){ $fieldValues['fieldPhone'] = $_POST['phone']; }

// Declaring title, extrastyle content for the page 
$title = "Signup - Buorso";
$extraStyle = 'account';
$content = getViews('views/signup.php', $fieldValues);

// Creating an object for signup queries
$signup = new Queries('users');

if(isset($_POST['submit'])){
	// Removing submit from the array
	unset($_POST['submit']);

	// Check if all fields are filled
	 if(!emptyCheck($_POST)){
		echo '<script>alert("Please fill all the fields")</script>';
		return;
	}

	// Checking if the email already exists in the Database
	$emailCheck = $signup->select('email', 'email', $_POST['email'],'');
	if($emailCheck->rowCount() > 0){
		echo '<script>alert("Email already exists")</script>';
		return;
	}

	// Checking if the email is valid
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	    echo '<script>alert("Invalid Email Address")</script>';
		return;
	}

	// Checking if the phone number already exists in the Database
	$phoneCheck = $signup->select('phone', 'phone', $_POST['phone'],'');
	if($phoneCheck->rowCount() > 0){
		echo '<script>alert("Phone Number already exists")</script>';
		return;
	}

	// Checking if the phone number is valid and 10 characters
	if(!preg_match('/^[0-9]*$/', trim($_POST['phone'])) || strlen(trim($_POST['phone'])) != 10){
		echo '<script>alert("Phone Number is invalid")</script>';
		return;
	}

	// Checking if the passwords field is empty
	if(empty(trim($_POST['password'])) || strlen(trim($_POST['password'])) < 8){
		echo '<script>alert("The password must be atleast 8 characters long")</script>';
		return;
	}

	// Hashing the password
	$_POST['password'] = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

	// Inserting the data into the Database
	if($signup->insert($_POST)){
		echo '<script>alert("Successful")</script>';
	}else{
		echo '<script>alert("Unsuccessful")</script>';
	}
}
?>