<?php
session_start();
$pagename = "Apex Tickets: Easiest way to buy tickets";
echo "<link rel=stylesheet type=text/css href=style.css>";

echo "<body>";
include("headfile.html");
include('detectlogin.php');
echo "<h4>" . $pagename . "</h4>";

//display random text
echo "<p>   Apex Tickets is an online ticket buying Web Application where the users are able to buy tickets for the best price</p>
            Apex Tickets is created and handled by a bunch of University Students as their part time hustle.
            Feel free to let give us feedbacks and opinions
			<h3>If you want to buy tickets online  Apex Tickets is happy to serve you! </h3>";
include("footfile.html"); //include head layout
echo "</body>";
?>