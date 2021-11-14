<?php 

if(isLoggedIn()){
	header('Location:'.$_SESSION['previousPage']);
}

// Creating an array with empty values for the login page fields
$fieldValues = [
	'fieldEmail' => ''
];

// Giving the value to the fields after the form is submitted
if(!empty($_POST['email'])){ $fieldValues['fieldEmail'] = $_POST['email']; }

// Declaring title, extrastyle content for the page 
$title = "Login - Buorso";
$extraStyle = 'account';
$content = getViews('views/login.php', $fieldValues);

// Creating an object for login queries
$login = new Queries('users');

if(isset($_POST['submit'])){
	// Check if all fields are filled
	 if(!emptyCheck($_POST)){
		echo '<script>alert("Please fill all the fields")</script>';
		return;
	}

	// using select function for checking the email in the database
	$result = $login->select('user_id, password', 'email', $_POST['email'],'');

	// If less than one result appear then email doesn't exist message is shown
	if($result->rowCount() < 1){
		echo '<script>alert("No Email")</script>';
		return;
	}

	// if the email exists then the data is fetched
	$data = $result->fetch();

	//the password is verified with the one in the database
	//if the password doesn't match, wrong password message is shown 
	if(!password_verify($_POST['password'], $data['password'])){
		echo '<script>alert("Wrong Password")</script>';
		return;
	}

	// When the login becomes successful
	$cryptoStrong = True;
	$token = bin2hex(openssl_random_pseudo_bytes(64, $cryptoStrong));

	$sessions = new Queries('sessions');
	$currentDateTime = date('Y-m-d H:i:s');
	// NEEDS CORRECTION
	$values = [
		'token' =>  hash('sha256', $token),
		'user_id' => $data['user_id'],
		'ip_address' => '192.168.14.123',
		'logged_in' => $currentDateTime
	];
	if($sessions->insert($values)){
		// Second last NULL is for SSL certified or not 
		// Problem might come with '/' path
		setcookie('BUIDT', $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
		setcookie('BUIDTT', 1, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
		$_SESSION['cookieCheck'] = true;
		header('Location:loginCheck');
	}
}
 ?>