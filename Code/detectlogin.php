<?php
if (isset($_SESSION['userId'])) {
     $fname = $_SESSION['fname'];
     $sname = $_SESSION['sname'];
     $cusid = $_SESSION['userId'];
	 $usertype = $_SESSION['user_type'];
	 
     echo "<div style=float:right>";
     echo "<p>" . $fname . " " . $sname . " | ". $usertype . " No:$cusid </p>";
     echo "</div>";
} else {
     echo "<a href=login.php>Login</a>";
}
