<!DOCTYPE html5>
<?php
session_start();
$pagename = "Sign Up";
echo "<link rel=stylesheet type=text/css href=style.css>";
echo "<link rel=stylesheet type=text/css href=signup.css>";



echo "<body>";
include("headfile.html");
echo "<h4>" . $pagename . "</h4>";

?>
<form method="POST" action="signup_process.php">
	<table>
		<tr>
			<td class='lblArea'>
				<label for="fname">*First Name</label>
			</td>
			<td class='longInput'>
				 <input type="text" name="fname" placeholder="John" id="fname">
			</td>
		</tr>
		<tr>
			<td class='lblArea'>
				 <label for="sname">*Last Name</label>
			</td>
			<td>
				 <input type="text" name="sname" placeholder="Micheal" id="sname">
			</td>
		</tr>
		<tr>
			<td class='lblArea'>
				<label for="address">*Address</label>
			</td>
			<td>
				 <input type="text" name="address" id="address">
			</td>
		</tr>
		<tr>
			<td class='lblArea'>
				 <label for="postcode">*Post Code</label>
			</td>
			<td>
				 <input type="text" name="postcode" id="postcode">
			</td>
		</tr>
		<tr>
			<td class='lblArea'>
				<label for="telno">*Tel No</label>
			</td>
			<td>
				 <input type="text" name="telno" id="telno">
			</td>
		</tr>
		<tr>
			<td class='lblArea'>
				 <label for="email">*Email Adress</label>
			</td>
			<td>
				 <input type="text" name="email" placeholder="John@gmail.com" id="email">
			</td>
		</tr>
		<tr>
			<td class='lblArea'>
				<label for="pass">*Password</label>
			</td>
			<td>
				 <input type="password" name="pwd" id="pass">
			</td>
		</tr>
		<tr>
			<td class='lblArea'>
				 <label for="conpwd">*Confirm Password</label>
			</td>
			<td>
				 <input type="password" name="conpwd" id="conpwd">
			</td>
		</tr>
		<tr>
			<td class='lblArea'>
				 <input type="submit" value="Sign Up" class="btn">
			</td>
			<td>
				 <input type="reset" value="Clear Form" class="btn">
			</td>
		</tr>
	</table>


</form>

<?php


include("footfile.html"); //include head layout
echo "</body>";
?>