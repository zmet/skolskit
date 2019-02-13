<h2>Ändra din profil</h2>
<?php if(!loggedin()) { 
	echo "Du måste vara inloggad för att kunna ändra din profil";
} else { 
	if(isset($_SESSION['user_id'])) {
		$query = ("SELECT * FROM `usertable` WHERE `id`='$user_id'");
		if($query_run = mysql_query($query)){
			$query_num_rows =  mysql_num_rows($query_run);

			if($query_num_rows==1) {
				if($row = mysql_fetch_array($query_run)) {
					$fname 		= $row['fname'];
					$lname 		= $row['lname'];
					$personnr 	= $row['personnr'];
					$address 	= $row['address'];
					$postnr 	= $row['postnr'];
					$city 		= $row['city'];
					$email 		= $row['email'];
					$homenr 	= $row['homenr'];
					$mobilenr 	= $row['mobilenr'];

					if(isset($_POST['address'])&&isset($_POST['postnr'])&&isset($_POST['city'])&&isset($_POST['email'])&&isset($_POST['homenr'])&&isset($_POST['mobilenr'])) {
						if(!empty($_POST['address'])&&!empty($_POST['postnr'])&&!empty($_POST['city'])&&!empty($_POST['email'])&&!empty($_POST['homenr'])&&!empty($_POST['mobilenr'])) {
							$address 	= mysql_real_escape_string($_POST['address']);
							$postnr 	= mysql_real_escape_string($_POST['postnr']);
							$city 		= mysql_real_escape_string($_POST['city']);
							$email 		= mysql_real_escape_string($_POST['email']);
							$homenr 	= mysql_real_escape_string($_POST['homenr']);
							$mobilenr 	= mysql_real_escape_string($_POST['mobilenr']);

							mysql_query("UPDATE `usertable` SET `address`='$address', `postnr`='$postnr', `city`='$city', `email`='$email', `homenr`='$homenr', `mobilenr`='$mobilenr' WHERE id='$user_id'");
							echo "Dina uppgifter är ändrade!";

						} else {
							echo "Du måste fylla i alla rutor!";
						}
					}

					?>
					<form id="change" action="index.php?p=change" method="POST">
						<label for="fname">Förnamn</label>
						<p class="red"><?php echo $fname; ?></p>
						<label for="lname">Efternamn</label>
						<p class="red"><?php echo $lname; ?></p>
						<label for="personnr">Personnummer</label>
						<p class="red"><?php echo $personnr; ?></p>
						<label for="address">Adress</label>
						<input type="text" id="address" name="address" value="<?php echo $address; ?>"  />
						<label for="postnr">Postnummer</label>
						<input type="text" id="postnr" name="postnr" value="<?php echo $postnr; ?>"  />
						<label for="city">Stad</label>
						<input type="text" id="city" name="city" value="<?php echo $city; ?>"  />
						<label for="email">Email</label>
						<input type="email" id="email" name="email" value="<?php echo $email; ?>"  />
						<label for="homenr">Hemnummer</label>
						<input type="text" id="homenr" name="homenr" value="<?php echo $homenr; ?>"  />
						<label for="mobilenr">Mobilnummer</label>
						<input type="text" id="mobilenr" name="mobilenr" value="<?php echo $mobilenr; ?>"  />
						<input type="submit" id="change_submit" name="change_submit" class="button" value="Uppdatera" />
					</form>
				<?php }
			}
		}
	}
}
?>