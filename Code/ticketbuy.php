
<?php
session_start();
include("db.php");
$pagename = "The best way to buy tickets";
echo "<link rel=stylesheet type=text/css href=style.css>";

echo "<body>";
include("headfile.html");
//include('detectlogin.php');

echo "<h4>" . $pagename . "</h4>";
//retrieve the ticket id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid
$tid = $_GET['u_t_id'];
//display the value of the ticket id, for debugging purposes
echo "</br>";

//SQL variable to retrieve ticket details
$SQL = "select tId, tName, tPic, tDescrip, tPrice, tQuantity FROM ticket WHERE tId = " . (int) $tid;
//SQL query to get information
$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

echo "<table style='border: 0px'>";
//prodbuy.php?u_t_id=".$arrayp['tId'].
while ($arrayp = mysqli_fetch_array($exeSQL)) {
	echo "<tr>";
	echo "<td style='border: 0px'>";
	//display the small image whose name is contained in the array

	echo "<a href=>";

	echo "<img src=" . $arrayp['tPic'] . " height=400 width=400>";
	echo "</a>";
	echo "</td>";
	echo "<td style='border: 0px'>";
	echo "<p><h5>" . $arrayp['tName'] . "</h5>"; //display ticket name as contained in the array
	echo "<p>" . $arrayp['tDescrip'] . "</p>"; //display small description of ticket
	echo "<p><strong> $ " . $arrayp['tPrice'] . "</strong></p>"; //displays price of the ticket
	echo "<p>Quantity in Stock: " . $arrayp['tQuantity'] . "</p>";
	if($_SESSION['userType'] == 'C') {
		echo "<p>Number to be purchased: ";
		//create form made of one text field and one button for user to enter quantity
		//the value entered in the form will be posted to the basket.php to be processed
		echo "<form action=basket.php method=post>";
		echo "<select name=p_quantity>";
		for ($i = 1; $i <= $arrayp['tQuantity']; $i++) {
			echo "<option value=$i>$i</option>";
		}
		echo "</select>";
		echo "<input type=submit value='ADD TO BASKET'>";
		//pass the ticket id to the next page basket.php as a hidden value
		echo "<input type=hidden name=h_prodid value=" . $tid . ">";
		echo "</form>";
		echo "<form action=wishlist.php method=post>";
		echo "<input type=hidden name=h_prodid value=" . $tid . ">";
		echo "<input type=submit value='Add to Wishlist'>";
		echo "</form>";
	} else {
		echo "<p>Go to <a href=editticket.php> edit ticket </a> page </p>";
	}
	echo "</td>";
	echo "</tr>";
}
echo "</table>";



include("footfile.html"); //include head layout
echo "</body>";
?>
