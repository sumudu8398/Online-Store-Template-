
<?php
    session_start();
    $pagename = "Log In";
    echo "<link rel=stylesheet type=text/css href=style.css>";
    echo "<link rel=stylesheet type=text/css href=form-style.css>";
    echo "<body>";
    include ("headfile.html");
    echo "<h4>".$pagename."</h4>";
?>

<form action="login_process.php" method="POST">
    <label for="email"> Email </label>
    <input type="text" name="email" id="email">
    <br>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass">
    <br>
    <input type="submit" value="Login">
    <input type="reset" value="Clear Form">
    
    
    
</form>
            <?php
	
	include("footfile.html"); //include head layout
	echo "</body>";
	?>
