
<?php
    session_start();
    include('db.php');
    $pagename = "Your Login Results";
    echo "<link rel=stylesheet type=text/css href=style.css>";

    echo "<body>";
    include ("headfile.html");

    echo "<h4>".$pagename."</h4>";
    $email = $_POST["email"];
    $password = $_POST["pass"];
    
    
    if(!empty($email) && !empty($password)){
        $SQL = "SELECT userId, userType, userFName, userSName, userEmail, userPassword FROM Users WHERE userEmail ='$email'";
        $result = mysqli_query($conn, $SQL);
        $arrayu = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if(!$arrayu['userEmail']) {
            echo "<p><strong>Login Failed!</strong></p>";
            echo "<p>Email not recognized</p>";
            echo "Go back to <a href=login.php>Login</a>";
        } else {
            if($password != $arrayu['userPassword']) {
                echo "<p><strong>Login Failed!</strong></p>";
                echo "<p>Entered password is incorrect!</p>";
                echo "Retry <a href=login.php>Login</a>";            
            } else {
                $_SESSION['userId'] = $arrayu['userId'];
                $_SESSION['userType'] = $arrayu['userType'];
                $_SESSION['fname'] = $arrayu['userFName'];
                $_SESSION['sname'] = $arrayu['userSName'];
                
                echo "<h5>Login Successful</h5>";
                echo "<p>Hello, ".$_SESSION['fname']." ".$_SESSION['sname']."</p>";
				if($_SESSION['userType'] == "A") {
					$_SESSION['user_type'] = 'Administrator';
				} else if($_SESSION['userType'] == "C") {
					$_SESSION['user_type'] = 'Customer';
                }
				echo "You have successfully logged in as a Apex Tickets ".$_SESSION['user_type'];
                echo "<p>Continue exploring for <a href=index.php>Apex Tickets</a></p>";
                if($_SESSION['userType'] == "C") {
				echo "<p>View your <a href=basket.php>Tickets Basket</a></p>";
				}
            }
        }

    } else {    
        echo "<p><strong>Login Failed!</strong></p>";
        echo "<p>Your login form is incomplete </br>
        Make sure you provide all the required fields.</p>";
        echo "Go back to <a href=login.php>Login</a>";

    }

    include("footfile.html"); //include head layout
    echo "</body>";
?>
