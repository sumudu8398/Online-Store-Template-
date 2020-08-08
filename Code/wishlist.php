
<?php
session_start();
include("db.php");
$pagename = "Wishlist";
echo "<link rel=stylesheet type=text/css href=style.css>";

echo "<body>";
include("headfile.html");
echo "<h4>" . $pagename . "</h4>";
if (isset($_POST['h_prodid'])) {
	$tid = $_POST['h_prodid'];
	$uid = $_SESSION['userId'];
	$SQL = "INSERT INTO WishList (tId, userId) VALUES (" . $tid . ", " . $uid . ");";
	$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
}
$SQL2 = "SELECT DISTINCT ticket.tName, ticket.tID, ticket.tPic, ticket.tPrice FROM ticket JOIN wishlist ON ticket.tID = wishlist.tId WHERE wishlist.userId = " . $_SESSION['userId'];
$exeSQL = mysqli_query($conn, $SQL2) or die(mysqli_error($conn));


echo "<h5>Your Wishlist</h5>";
echo "<table style='border: 0px'>";
while ($arrayp = mysqli_fetch_array($exeSQL)) {
	echo "<tr>";
	echo "<td style='border: 0px'>";

	echo "<a href=ticketbuy.php?u_t_id=" . $arrayp['tID'] . ">";

	echo "<img src=" . $arrayp['tPic'] . " height=200 width=200>";
	echo "</a>";
	echo "</td>";
	echo "<td style='border: 0px'>";
	echo "<p><h5>" . $arrayp['tName'] . "</h5>"; //display product name as contained in the array
	echo "<p><strong> Rs. " . $arrayp['tPrice'] . "</strong></p>";; //displays price of the product
	echo "</td>";

	echo "</tr>";
}
echo "</table>";

include("footfile.html"); //include head layout
echo "</body>";
?>
