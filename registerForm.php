<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/design.css">
</head>
<body>
	<div class="container">
		
		<form method="POST" action="" name="regForm" onsubmit="return validate()">
		
		<input type="text" name="fname" placeholder="First Name" class="inputStyle" required><br>

		<input type="text" name="lname" placeholder="Last Name" class="inputStyle" required><br>

		<input type="email" name="email" placeholder="E-mail" class="inputStyle" required><br>

		<input type="password" name="pass" placeholder="Password" class="inputStyle" required
		required minlength="6"><br>

		<input type="password" name="confirmPassword" placeholder="Confirm password" class="inputStyle" required minlength="6" title="Password Mismatch"><br>

		<div id="conPass_error" class="passError"></div>

		<input type="radio" name="gender" value="Male" required>Male
		<input type="radio" name="gender" value="Female">Female
		<br><br>

		<input type="submit" name="submit" value="Register">

		</form>

	</div>

		<?php

		require('connectDB.php');
		//if submitted isulod na niya sa DB ang mga data sa tanan fields

		if (isset($_POST['email'])) {
			
			$fname = stripslashes($_POST['fname']);
			$lname = stripslashes($_POST['lname']);
			$email = stripslashes($_POST['email']);
			$pass = stripslashes($_POST['pass']);
			$conpass = stripslashes($_POST['confirmPassword']);
			$gender = $_POST['gender'];
			
			$fname = mysqli_real_escape_string($connect,$fname);
			$lname = mysqli_real_escape_string($connect,$lname);
			$email = mysqli_real_escape_string($connect,$email);
			$pass = mysqli_real_escape_string($connect,$pass);
			$pass = mysqli_real_escape_string($connect,$conpass);
			
			$regQuery = "INSERT INTO user (firstname, lastname, email, password, gender) VALUES (\"".$fname."\", \"".$lname."\", \"".$email."\", \"".$pass."\", \"".$gender."\")";

			$result = mysqli_query($connect, $regQuery);

			if($result){
				echo '<script language="javascript">';
				echo 'alert("Registered successfully")';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("Registered Failed")';
				echo '</script>';
			}
		}

	?>

<script type="text/javascript">
	
	var pass = document.forms["regForm"]["pass"];
	var conPass = document.forms["regForm"]["confirmPassword"];

	var conPass_error = document.getElementById("conPass_error");

function validate(){
	if (pass.value != conPass.value) {
		// conPass_error.inputStyle = "Password mismatch";
		alert("Password mismatch")
			return false;
	}
	else {
		alert("Passwords Match!!!");
	}
	return true;
}

</script>


</body>
</html>

