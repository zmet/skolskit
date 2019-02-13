<h2>Lägg till ny administratör</h2>
<?php
if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['worknr'])&&isset($_POST['username'])&&isset($_POST['password'])) {
	$fname 		= $_POST['fname'];
	$lname 		= $_POST['lname'];
	$email 		= $_POST['email'];
	$worknr 	= $_POST['worknr'];
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];

	if(!empty($_POST['fname'])&&!empty($_POST['lname'])&&!empty($_POST['email'])&&!empty($_POST['worknr'])&&!empty($_POST['username'])&&!empty($_POST['password'])) {
		$query = "SELECT * FROM admintable WHERE fname='$fname' AND lname='$lname' AND username='$username'";
		if($query_run=mysql_query($query)) {
			$query_num_rows = mysql_num_rows($query_run);

			if($query_num_rows==1){
				echo "Denna användaren finns redan i databasen.";
			} else {
				$fname 		= mysql_real_escape_string($fname);
				$lname 		= mysql_real_escape_string($lname);
				$email 		= mysql_real_escape_string($email);
				$worknr 	= mysql_real_escape_string($worknr);
				$username 	= mysql_real_escape_string($username);
				$password 	= mysql_real_escape_string($password);

				$query = "INSERT INTO admintable VALUES ('', '$fname', '$lname', '$email', '$worknr', '$username', '$password')";
				if($query_run=mysql_query($query)) {
					header("Location: index.php?p=complete");
				} else {
					echo "Vi kunde inte lägga till användaren.";
				}
			}
		}
	} else {
		echo "Du måste fylla i alla rutor";
	}
}
?>
<form id="adduser" action="index.php?p=adduser" method="POST">
	<label for="fname">Förnamn</label>
	<input type="text" name="fname" placeholder="Lars" />
	<label for="lname">Efternamn</label>
	<input type="text" name="lname" placeholder="Larsson" />
	<label for="email">Email</label>
	<input type="email" name="email" placeholder="lars.larsson@mail.se" />
	<label for="worknr">Telefonnummer</label>
	<input type="text" name="worknr" placeholder="0520112233" />
	<label for="username">Användarnamn</label>
	<input type="text" name="username" placeholder="larslarsson" />
	<label for="password">Lösenord</label>
	<input type="number" name="password" placeholder="1234" />
	<input type="submit" name="adduser_submit" value="Lägg till" />
</form>