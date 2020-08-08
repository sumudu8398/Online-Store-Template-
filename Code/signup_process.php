
<?php
session_start();
include("db.php");
$pagename = "The Results For Your Sign Up Results";
echo "<link rel=stylesheet type=text/css href=style.css>";

echo "<body>";
include("headfile.html");

echo "<h4>" . $pagename . "</h4>";

//variables to hold values from previous page form
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$telno = $_POST['telno'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['conpwd'];

if ($fname && $sname && $address && $postcode && $telno && $email && $pwd) {
	if ($pwd != $cpwd) {
		echo "<p>Entered Password did not match!</p>";
		echo "</br>";
		echo "<a href=user_signup.php>Enter Details Again.</a>";
	} else {
		$regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
		if (preg_match($regex, $email)) {
			//Add the user to the database
			$SQL = "INSERT into Users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) 
				VALUES ('C', '$fname', '$sname', '$address', '$postcode', '$telno', '$email', '$pwd');";
			$exeSQL = mysqli_query($conn, $SQL);
			$errno = (mysqli_errno($conn));
			if($errno == 0) {
				echo "<p>Registration was successful!</p>";
				echo "Go to<a href=login.php>Login</a>";
			} else {
				echo "<p>Error Occurred while registering user. </p>";
				if ($errno == 1062) {
					echo "<p>There is already an account with that e-mail address</p>";
					echo "<a href=user_signup.php>Enter Details Again.</a>";

				} 
				if($errno == 1064) {
					echo "<p>Invalid characters used in the form such as ' and /</p>";
					echo "<a href=user_signup.php>Enter Details Again.</a>";
				}
			}
		} else {
			echo "Entered Email Address is invalid, Please enter a valid email address";
			echo "</br>";
			echo "<a href=user_signup.php>Enter Details Again.</a>";
		}
	}
} else {
	echo "All required fields should be filled";
	echo "</br>";
	echo "<a href=user_signup.php>Enter Details Again.</a>";
}




include("footfile.html"); //include head layout
echo "</body>";
?>
