<h2>Hyresägare</h2>
<p>En lista på hyresägare av lägenheter</p>
<?php
$query_owner = "SELECT * FROM ownertable";
if($query_run_owner=mysql_query($query_owner)){
	$query_num_rows_owner=mysql_num_rows($query_run_owner);

	if($query_num_rows_owner!=0){

		/* query -> get user from usertable */
		$rows_owner = array();
		while($row_owner = mysql_fetch_array($query_run_owner)) {
			$rows_owner[] = $row_owner;
		}
		foreach($rows_owner as $row_owner) {
			$id			= $row_owner['id'];
			$userid 	= $row_owner['userid'];
			$apartid 	= $row_owner['apartid'];

			$query_user = "SELECT * FROM usertable WHERE id=$userid";
			if($query_run_user=mysql_query($query_user)) {
				$rows_user=array();

				while($row_user = mysql_fetch_array($query_run_user)) {
					$rows_user[] = $row_user;
				}
				foreach($rows_user as $row_user){
					$id			= $row_user['id'];
					$fname 		= $row_user['fname'];
					$lname 		= $row_user['lname'];
					$personnr 	= $row_user['personnr'];
					$address 	= $row_user['address'];
					$postnr 	= $row_user['postnr'];
					$city 		= $row_user['city'];
					$email 		= $row_user['email'];
					$homenr 	= $row_user['homenr'];
					$mobilenr 	= $row_user['mobilenr'];

					$query_apart = "SELECT * FROM apartments WHERE id=$apartid";
					if($query_run_apart=mysql_query($query_apart)) {
						$rows_apart=array();

						while($row_apart = mysql_fetch_array($query_run_apart)) {
							$rows_apart[] = $row_apart;
						}
						foreach($rows_apart as $row_apart){
							$apartnumber	= $row_apart['apartnumber'];
							$address 		= $row_apart['address'];
							$postnr 		= $row_apart['postnr'];
							$city 			= $row_apart['city'];
							$price 			= $row_apart['price'];
							$floor 			= $row_apart['floor'];
							$size 			= $row_apart['size'];
							$room 			= $row_apart['room'];
							$area 			= $row_apart['area'];
							$balkony 		= $row_apart['balkony'];
							$elevator 		= $row_apart['elevator'];

							echo "<h3>".$fname." ".$lname."</h3>";
							echo "<p>Hyr lägenhet: <span class='red'>".$address." (".$apartnumber.")</span></p><br />";
							echo "<div class='left'>";
								echo "<ul>";
									echo "
										<li class='red'>Personinformation</li>
										<li>Personnummer: <span class='bold'>".$personnr."</span></li>
										<li>Email: <span class='bold'>".$email."</span></li>
										<li>Hemnummer: <span class='bold'>".$homenr."</span></li>
										<li>Mobilnummer: <span class='bold'>".$mobilenr."</span></li>
									";
								echo "</ul>";
							echo "</div>";
							echo "<div class='right'>";
								echo "<ul>";
									echo "
										<li class='red'>Lägenhetsinformation</li>
										<li>Postnummer: <span class='bold'>".$postnr."</span></li>
										<li>Stad: <span class='bold'>".$city."</span></li>
										<li>Hyra: <span class='bold'>".$price." kr</span></li>
										<li>Våning: <span class='bold'>".$floor."</span></li>
										<li>Storlek: <span class='bold'>".$size." kvm</span></li>
										<li>Rum: <span class='bold'>".$room."</span></li>
										<li>Område: <span class='bold'>".$area."</span></li>
										<li>Balkong: <span class='bold'>".$balkony."</span></li>
										<li>Hiss: <span class='bold'>".$elevator."</span></li>
									";
								echo "</ul>";
							echo "</div>";
						}
					}
				}
			}
		}
	} else {
		echo "Inga uthyrda lägenheter just nu.";
	}
}

?>