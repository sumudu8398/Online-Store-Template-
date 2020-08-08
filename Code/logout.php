
<?php
session_start();
$pagename = "Logout";
echo "<link rel=stylesheet type=text/css href=css/style.css>";

echo "<body>";
include("headfile.html");
include('detectlogin.php');

echo "<h4>" . $pagename . "</h4>";
$fname = $_SESSION['fname'];
$sname = $_SESSION['sname'];
$userid = $_SESSION['userId'];

echo "<p>Thank you " . $fname . " " . $sname . "</p>";
session_unset();
session_destroy();
if (!isset($_SESSION['userid'])) {
	echo "You are logged out now!";
}

include("footfile.html"); //include head layout
echo "</body>";
?>
