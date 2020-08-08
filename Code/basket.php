
<?php
session_start();
include("db.php");
$pagename = "Your Smart Basket";
echo "<link rel=stylesheet type=text/css href=style.css>";

echo "<body>";
include("headfile.html");

echo "<h4>" . $pagename . "</h4>";
include('detectlogin.php');

//Checks if item was removed and updates basket 
if (isset($_POST['removeprodid'])) {
	$delprodid = $_POST['removeprodid'];
	unset($_SESSION['basket'][$delprodid]);
	echo "1 Item was removed";
	echo "</br>";
}

//checks to see if an item was added 
if (isset($_POST['h_prodid'])) {
	$newprodid = $_POST['h_prodid'];
	$reququantity = $_POST['p_quantity'];

	//add item to Session's basket
	$_SESSION['basket'][$newprodid] = $reququantity;
	echo "<p> 1 item added </p>";
	echo "</br>";
}



echo "<table style='border: 2px'>";
echo "<th>Ticket Name</th>";
echo "<th>Price</th>";
echo "<th>Quantity</th>";
echo "<th>Subtotal</th>";
echo "<th></th>";

$total = 0;

if (isset($_SESSION['basket'])) {
	foreach ($_SESSION['basket'] as $index => $value) {

		$SQL = "select tID, tName, tPrice, tQuantity FROM ticket WHERE tID = " . (int) $index;
		//SQL query to get information
		$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
		while ($arrayp = mysqli_fetch_array($exeSQL)) {
			echo "<tr>";
			echo "<td> " . $arrayp['tName'] . "</td>";
			echo "<td> " . $arrayp['tPrice'] . "</td>";
			echo "<td> " . $value . "</td>";
			$subtotal = $arrayp['tPrice'] * $value;
			echo "<td> " . $subtotal . "</td>";
			echo "<td> <form method=post action=basket.php>";
			echo "<input type=text name=removeprodid value=" . $index . " hidden>";
			echo "<input type=submit value=Remove>";
			echo "</form>";
			echo "</td>";
			echo "</tr>";
			$total += $subtotal;
		}
	}
} else {
	echo "<tr> <td colspan='4'>No items in basket </td></tr>";
}
echo "<tr>";
echo "<td colspan='3' style='text-align:right'><strong> Total </strong></td>";
echo "<td><strong>$" . $total . "</strong></td>";
echo "<td></td>";

echo "</tr>";


echo "</table>";
//go to page which starts a new session resetting basket 
echo "</br>";
echo "<a href=clearbasket.php>CLEAR BASKET</a>";
echo "</br>";
echo "</br>";

if (isset($_SESSION['userId'])) {
	echo "To finalise your order: <a href=checkout.php>Checkout </a>";
} else {
	echo "<p>New homteq customers: <a href=signup.php>Sign Up</a>";
	echo "<p>Returning homteq customers: <a href=login.php>Login</a>";
}
//TODO: links to sign up and login to account

include("footfile.html"); //include head layout
echo "</body>";
?>
