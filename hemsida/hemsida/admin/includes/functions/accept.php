<h2>Accepterat ansökan</h2>
<?php
$userid  = $_POST['userid'];
$apartid = $_POST['apartid'];

$query_user = "SELECT * FROM usertable WHERE id=$userid";
if($query_run_user=mysql_query($query_user)){
	$query_num_rows_user=mysql_num_rows($query_run_user);

	if($query_num_rows_user==1){
		if($row_user=mysql_fetch_array($query_run_user)){
			$fname 		= $row_user['fname'];
			$lname 		= $row_user['lname'];
			$personnr 	= $row_user['personnr'];
			$address 	= $row_user['address'];
			$postnr 	= $row_user['postnr'];
			$city 		= $row_user['city'];
			$email 		= $row_user['email'];
			$homenr 	= $row_user['homenr'];
			$mobilenr 	= $row_user['mobilenr'];

			echo "<div class='left'>";
				echo "<h3>".$fname." ".$lname."</h3>";
				echo "<ul>";
					echo "
						<li>Personnummer: <span class='bold'>".$personnr."</span></li>
						<li>Adress: <span class='bold'>".$address."</span></li>
						<li>Postnummer: <span class='bold'>".$postnr."</span></li>
						<li>Stad: <span class='bold'>".$city."</span></li>
						<li>Email: <span class='bold'>".$email."</span></li>
						<li>Hemnummer: <span class='bold'>".$homenr."</span></li>
						<li>Mobilnummer: <span class='bold'>".$mobilenr."</span></li>
					";
				echo "</ul>";
			echo "</div>";
		}
	}
}

$query_apart = "SELECT * FROM apartments WHERE id=$apartid";
if($query_run_apart=mysql_query($query_apart)){
	$query_num_rows_apart=mysql_num_rows($query_run_apart);

	if($query_num_rows_apart==1){
		if($row_apart=mysql_fetch_array($query_run_apart)){
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
			$active 		= $row_apart['active'];

			echo "<div class='right'>";
				echo "<h3>".$address." (".$apartnumber.")</h3>";
				echo "<ul>";
					echo "
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

if(isset($_POST['finishaccept_submit'])) {
	if(!empty($_POST['userid'])&&!empty($_POST['apartid'])){
		$insert_query = "INSERT INTO ownertable VALUES ('', '$userid', '$apartid')";
		if($insert_query_run=mysql_query($insert_query)){

			$update_query = "UPDATE apartments SET active=0 WHERE id=$apartid";
			if($update_query_run=mysql_query($update_query)){
				header("Location: index.php?p=complete");
			}
		}
	}
}
?>
<form action="index.php?p=accept" method="POST">
	<input type='hidden' name='userid' value='<?php echo $userid ?>' />
	<input type='hidden' name='apartid' value='<?php echo $apartid ?>' />
	<input type="submit" name="finishaccept_submit" value="Acceptera" />
</form>