
<?php
session_start();
include('db.php');
$pagename = "Edit Profile Details";
echo "<link rel=stylesheet type=text/css href=style.css>";

echo "<body>";
include("headfile.html");

echo "<h4>" . $pagename . "</h4>";
include('detectlogin.php');
$userId = $_SESSION['userId'];
// if (isset($userId)) {
// 	$update_fname = $_POST['new_fname'];
// 	$update_sname = $_POST['new_sname'];
// 	$update_useradd = $_POST['new_useradd'];
// 	$update_userpcode = $_POST['new_pcode'];
// 	$update_telno = $_POST['new_telno'];
// 	$update_password = $_POST['new_password'];
// 	$SQL = "SELECT userFname, userType, userFname, userSname, userAddress, userPostCode, userTelNo,userPassword FROM users WHERE userId = $userId";
// 	$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
// 	$arrayqu = mysqli_fetch_array($exeSQL);
// 	$update_fname = $arrayqu['userFname'];
// 	if (!empty($update_fname)) {
// 		$updateSQL = "UPDATE users SET userFname = " . $update_fname . " WHERE userId = " . $userId;
// 		$exeUpdate = mysqli_query($conn, $updateSQL);
// 	}
// 	if (!empty($update_sname)) {
// 		$updateSQL = "UPDATE users SET userFname = " . $update_sname . " WHERE userId = " . $userId;
// 		$exeUpdate = mysqli_query($conn, $updateSQL);
// 	}
// 	if (!empty($update_useradd)) {
// 		$updateSQL = "UPDATE users SET userAddress = " . $update_useradd . " WHERE userId = " . $userId;
// 		$exeUpdate = mysqli_query($conn, $updateSQL);
// 	}
// 	if (!empty($update_userpcode)) {
// 		$updateSQL = "UPDATE users SET userPostCode = " . $update_userpcode . " WHERE userId = " . $userId;
// 		$exeUpdate = mysqli_query($conn, $updateSQL);
// 	}
// 	if (!empty($update_telno)) {
// 		$updateSQL = "UPDATE users SET userTellNo = " . $update_telno . " WHERE userId = " . $userId;
// 		$exeUpdate = mysqli_query($conn, $updateSQL);
// 	}
// 	if (!empty($update_password)) {
// 		$updateSQL = "UPDATE users SET userPassword = " . $update_password . " WHERE userId = " . $userId;
// 		$exeUpdate = mysqli_query($conn, $updateSQL);
// 	}
// }

$SQL = "SELECT userFname, userType, userFname, userSname, userAddress, userPostCode, userTelNo, userPassword FROM users WHERE userId = $userId";
//SQL query to get information
$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

echo "<table style='border: 0px'>";
//prodbuy.php?u_prod_id=".$arrayp['prodId'].
while ($arrayp = mysqli_fetch_array($exeSQL)) {
	echo "<tr>";
	echo "<td style='border: 0px'>";
	//display the details
	echo "</td>";
	echo "<td style='border: 0px'>";
	echo "<div style='display: inline-block; margin-left: 3%'>";
	echo "<form method=POST action=editprofile.php>";
	echo "<p>New First Name: <input type=text name ='new_fname' value=" . $arrayp['userFname'] . "></p>";
	echo "<p>New Last Name: <input type=text name ='new_sname' value=" . $arrayp['userSname'] . "></p>";
	echo "<p>New Address: <input type=text name ='new_useradd' value=" . $arrayp['userAddress'] . "></p>";
	echo "<p>New Postal Code: <input type=text name ='new_pcode' value=" . $arrayp['userPostCode'] . "></p>";
	echo "<p>New Telephone Number: <input type=text name ='new_telno' value=" . $arrayp['userTelNo'] . "></p>";
	echo "<p>New Password: <input type=password name ='new_password'></p>";
	echo "</div>";
	echo "<br>";
	echo "<input type=submit value=Update>";
	echo "</td>";
	echo "</form>";

	echo "</tr>";
}
echo "</table>";


include("footfile.html"); //include head layout
echo "</body>";
?>
