
<?php
session_start();
include('db.php');
$pagename = "Clear Smart Basket";
echo "<link rel=stylesheet type=text/css href=style.css>";

echo "<body>";
include("headfile.html");

echo "<h4>" . $pagename . "</h4>";
include('detectlogin.php');
unset($_SESSION['basket']);

echo "</br>";
echo "<p> Your basket has been cleared </p>";
include("footfile.html"); //include head layout
echo "</body>";
?>
