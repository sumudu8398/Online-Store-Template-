
<?php
	session_start();
	include("db.php");
	$pagename = "Ratings";
	echo "<link rel=stylesheet type=text/css href=style.css>";
	
	echo "<body>";
	include ("headfile.html");
	
	echo "<h4>".$pagename."</h4>";
	include('detectlogin.php');
	
	$userid = $_SESSION['userId'];
	if(isset($_POST['prodid'])){
		$rating = $_POST['rating'];
		$prodid = $_POST['prodid'];
		$SQL = "INSERT INTO Rating (ratingVal, userId, productId) VALUES (".(int)$rating.", ".(int)$userid.", ".(int)$prodid.")";
		$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
	} else if (isset($_POST['updprod'])) {
		$rating = $_POST['updrate'];
		$prodid = $_POST['updprod'];
		$SQL = "UPDATE rating SET ratingVal =".(int)$rating." WHERE userId = ".(int)$userid." AND productId = ".(int)$prodid;
		$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
		
	}
	
	
	echo "<h5>Previously purchased products</h5>";
	$SQL = "SELECT DISTINCT Product.prodId, Product.prodName, product.prodPicNameSmall, Rating.ratingVal FROM orders JOIN order_line ON Orders.orderNo = order_line.orderNo 
	JOIN product ON product.prodId = order_line.prodId LEFT JOIN Rating ON Rating.userId = orders.userId AND rating.productId = product.prodId WHERE orders.userId = ".$userid;
	$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
	echo "<table border= 0>";
	
	echo "<th colspan=2></th>";
	echo "<th >Your rating</th>";
	
	while($arrayr = mysqli_fetch_array($exeSQL)) {
		echo "<tr>";
		echo "<td >";
		echo "<img src=" . $arrayr['prodPicNameSmall'] . " height=100 width=100>";	
		echo "</td>";
		echo "<td>";
		echo "<p>". $arrayr['prodName'] . "</p>";
		echo "</td>";
		echo "<td>";
		echo "<p>". $arrayr['ratingVal'] . "</p>";
		echo "</td>";
		echo "<td>";
		if(!isset($arrayr['ratingVal'])) {
			echo "<form action=rating.php method=post>";
			echo "<select name=rating>";
			for($i=0; $i<6; $i++){
				if($arrayr['ratingVal'] == $i) {	
					echo "<option value=".$i." selected>" .$i ."</option>"; 
				} else {
					echo "<option value=".$i.">" .$i ."</option>"; 
				}
			}
			echo "<select>";
			echo "<input type=hidden name=prodid value=".$arrayr['prodId'].">";
			echo "<input type=submit value=Rate>";
			echo "</form>";
			
		}else {
			echo "<form action=rating.php method=post>";
			echo "<select name=updrate>";
			for($i=0; $i<6; $i++){
				if($arrayr['ratingVal'] == $i) {	
					echo "<option value=".$i." selected>" .$i ."</option>"; 
				} else {
					echo "<option value=".$i.">" .$i ."</option>"; 
				}
			}
			echo "<select>";
			echo "<input type=hidden name=updprod value=".$arrayr['prodId'].">";
			echo "<input type=submit value=Update>";
			echo "</form>";
		}
		echo "</td>";
		
	
	}
	
	
	echo "</table>";
	
	
	include("footfile.html"); //include head layout
	echo "</body>";
	?>
