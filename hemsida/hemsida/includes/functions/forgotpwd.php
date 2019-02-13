<h2>Glömt lösenord</h2>
<?php
if(loggedin()) {
	echo "Du är redan inloggad!";
} else if(!loggedin()) {
	if(isset($_POST['personnr'])) {
		if(!empty($_POST['personnr'])) {
			$personnr = $_POST['personnr'];
			$query = "SELECT * FROM usertable WHERE personnr=$personnr";
			if($query_run = mysql_query($query)){
				$query_num_rows =  mysql_num_rows($query_run);

				if($query_num_rows==0) {
					echo "Ditt personnummer finns inte registrerat";
				} else if($query_num_rows==1){
					if($row = mysql_fetch_array($query_run)) {
						$password = $row['password'];
						email('$email', 'Din pinkod från Lägenheter', "
							Hejsan ".$fname." ".$lname."!\n\n
							Här kommer din pinkod till inloggningen:\n\n
							".$password."\n\n
							- Skickat från Lägenheter
							");
						header('Location: index.php?p=completepwd');
					}
				}
			}
		} else {
			echo "Du måste skriva in ditt personnummer";
		}
	}
?>
<form id="forgotpwd" action="index.php?p=forgotpwd" method="POST">
	<label for="personnr">Personnummer</label>
	<input type="text" name="personnr" id="personnr" placeholder="201201014433" />
	<input type="submit" id="forgotpwd_submit" class="button" value="Skicka" />
</form>
<?php } ?>