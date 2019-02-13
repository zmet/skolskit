<h2>Registrering</h2>
<?php
if(loggedin()) {
	echo "Du är redan inloggad!";
} else if (!loggedin()) {
	echo "<div class='message'>";
	if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['personnr'])&&isset($_POST['address'])&&isset($_POST['postnr'])&&isset($_POST['city'])&&isset($_POST['email'])&&isset($_POST['homenr'])&&isset($_POST['mobilenr'])) {
		$fname 		= $_POST['fname'];
		$lname 		= $_POST['lname'];
		$personnr 	= $_POST['personnr'];
		$address 	= $_POST['address'];
		$postnr 	= $_POST['postnr'];
		$city 		= $_POST['city'];
		$email 		= $_POST['email'];
		$homenr 	= $_POST['homenr'];
		$mobilenr 	= $_POST['mobilenr'];

		if(!empty($fname)&&!empty($lname)&&!empty($personnr)&&!empty($address)&&!empty($postnr)&&!empty($city)&&!empty($email)&&!empty($homenr)&&!empty($mobilenr)) {

			$query = "SELECT `personnr` FROM `usertable` WHERE `personnr`='$personnr'";
			if($query_run = mysql_query($query)){
				$query_num_rows = mysql_num_rows($query_run);

				if($query_num_rows==1) {
					echo "
						Det valda personnummret ".$personnr.", finns redan registrerat i databasen, välj ett annat! <br />
						Eller om du har glömt din pinkod kan vi skicka en ny till dig <a href='index.php?p=forgotpwd'>här</a>
					";
				} else {
					$fname 		= mysql_real_escape_string($fname);
					$lname 		= mysql_real_escape_string($lname);
					$personnr 	= mysql_real_escape_string($personnr);
					$address 	= mysql_real_escape_string($address);
					$postnr 	= mysql_real_escape_string($postnr);
					$city 		= mysql_real_escape_string($city);
					$email 		= mysql_real_escape_string($email);
					$homenr 	= mysql_real_escape_string($homenr);
					$mobilenr 	= mysql_real_escape_string($mobilenr);

					$password 	= RandomPassword(4);
					$registered = date("Ymd");

					$query = "INSERT INTO `usertable` VALUES ('','$fname','$lname','$personnr','$password','$address','$postnr','$city','$email','$homenr','$mobilenr','$registered')";
					if($query_run = mysql_query($query)){
						email('$email', 'Din pinkod från BoStad', "
							Hejsan ".$fname." ".$lname."!\n\n
							Här kommer din pinkod till inloggningen:\n\n
							".$password."\n\n
							- Skickat från BoStad.se
							");
						header("Location: index.php?p=completereg");
					} else {
						echo "Vi kunde tyvärr inte genomföran din registrering just nu, försök igen.";
					}

				}
			}
		} else {
			echo "Du måste fylla i alla rutor!";
		}
	}
	echo "</div>";
	?>

	<form id="register" action="index.php?p=register" method="POST">
	<label for="fname">Förnamn</label>
	<input type="text" id="fname" name="fname" placeholder="Förnamn" />
	<label for="lname">Efternamn</label>
	<input type="text" id="lname" name="lname" placeholder="Efternamn" />
	<label for="personnr">Personnummer</label>
	<input type="text" id="personnr" name="personnr" placeholder="201201014433"  />
	<label for="address">Adress</label>
	<input type="text" id="address" name="address" placeholder="Adress"  />
	<label for="postnr">Postnummer</label>
	<input type="text" id="postnr" name="postnr" placeholder="46130"  />
	<label for="city">Stad</label>
	<input type="text" id="city" name="city" placeholder="Stad"  />
	<label for="email">Email</label>
	<input type="email" id="email" name="email" placeholder="Email"  />
	<label for="homenr">Hemnummer</label>
	<input type="text" id="homenr" name="homenr" placeholder="0520-123456"  />
	<label for="mobilenr">Mobilnummer</label>
	<input type="text" id="mobilenr" name="mobilenr" placeholder="0731122334"  />
	<input type="submit" id="register_submit" name="register_submit" class="button" value="Registrera" />
</form>
<?php
}
?>