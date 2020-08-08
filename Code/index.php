
<?php
session_start();
include("db.php");
$pagename = "Apex Tickets";
echo "<link rel=stylesheet type=text/css href=style.css>";

echo "<body>";
include("headfile.html");

echo "<h4>" . $pagename . "</h4>";
//include('detectlogin.php');
//SQL variable to retrieve product details
$SQL = "select tId, tName, tPic, tDescrip, tPic, tPrice, tQuantity FROM ticket";
//SQL query to get information
$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

echo "<table style='border: 0px'>";
while ($arrayp = mysqli_fetch_array($exeSQL)) {
	echo "<tr>";
	echo "<td style='border: 0px'>";

	echo "<a href=ticketbuy.php?u_t_id=" . $arrayp['tId'] . ">";

	echo "<img src=" . $arrayp['tPic'] . " height=200 width=200>";
	echo "</a>";
	echo "</td>";
	echo "<td style='border: 0px'>";
	echo "<p><h5>" . $arrayp['tName'] . "</h5>"; //display product name as contained in the array
	echo "<p>" . $arrayp['tDescrip'] . "</p>"; //display small description of product
	echo "<p><strong> Rs. " . $arrayp['tPrice'] . "</strong></p>";; //displays price of the product
	echo "</td>";

	echo "</tr>";
}
echo "</table>";


include("footfile.html"); //include head layout
echo "</body>";
?>
