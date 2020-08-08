
<?php
session_start();
date_default_timezone_set('Asia/Colombo');
$pagename = "Checkout";
include('db.php');

echo "<link rel=stylesheet type=text/css href=style.css>";

echo "<body>";
include("headfile.html");
include('detectlogin.php');
echo "<h4>" . $pagename . "</h4>";
$currentdatetime = date('Y-m-d H:i:s');
echo $currentdatetime;
$userid = $_SESSION['userId'];
echo "</br>";
if (isset($userid)) {
	$SQL = "INSERT INTO Orders (userId, orderDateTime) VALUES ($userid, '$currentdatetime')";
	$exesql = mysqli_query($conn, $SQL);
	$errno = mysqli_errno($conn);
	if ($errno == 0) {
	$selectSQL = "SELECT orderNo FROM Orders WHERE userId = $userid ORDER BY orderNo DESC LIMIT 1";
	$result = mysqli_query($conn, $selectSQL);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$orderno = $row['orderNo'];

		echo "<p>Order has been placed successfully  | Order No: " . $orderno . "</p>";
		echo "<table style='border: 2px'>";
		echo "<th>Ticket Name</th>";
		echo "<th>Price</th>";
		echo "<th>Quantity</th>";
		echo "<th>Subtotal</th>";

		$total = 0.0;
		if (isset($_SESSION['basket'])) {
			foreach ($_SESSION['basket'] as $index => $value) {

				$SQL = "select tID, tName, tDescrip,tPrice, tQuantity FROM ticket WHERE tID = " . (int) $index;
				//SQL query to get information
				$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
				while ($arrayp = mysqli_fetch_array($exeSQL)) {
					$prodid = $arrayp['tID'];
					$prodname = $arrayp['tName'];
					$prodPrice = $arrayp['tPrice'];
					echo "<tr>";
					echo "<td> " . $prodname  . "</td>";
					echo "<td> " . $prodPrice . "</td>";
					echo "<td> " . $value . "</td>";
					$subtotal = $prodPrice * $value;
					echo "<td> " . $subtotal . "</td>";
					echo "</td>";
					echo "</tr>";
					$insertSQL = "INSERT INTO Order_Line (orderNo, tID, quantityOrdered, subtotal) VALUES ($orderno, $prodid, $value, $subtotal)";
					$exeinsert = mysqli_query($conn, $insertSQL);
					if (mysqli_errno($conn) != 0) {
						echo mysqli_error($conn);
					}
				}
				$total += $subtotal;
			}
			$updateSQL = "UPDATE Orders SET orderTotal = ". $total . ", orderStatus = 'Placed' WHERE orderNo = $orderno";
			$exeupdate = mysqli_query($conn, $updateSQL);
			echo "<tr>";
			echo "<td colspan='3' style='text-align:right'><strong> Total </strong></td>";
			echo "<td><strong>$" . $total . "</strong></td>";
			echo "</tr>";
			echo "</table>";
			echo "<p>Order Completed! </p>";
			echo "<a href=logout.php>Logout</a>";
			}
		}
	} else {
	echo "Error occured while adding";
	echo "<br> Error : " . mysqli_error($conn);
	}
	unset($_SESSION['basket']);
 } else {
	echo "ERROR: No items to add";
}
include("footfile.html"); //include head layout
echo "</body>";
?>
