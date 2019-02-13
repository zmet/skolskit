<?php 
if(!loggedin()) {
	echo "<h2>Logga in</h2>";
	if(isset($_POST['personnr'])&&isset($_POST['password'])) {

		$personnr = $_POST['personnr'];
		$password = $_POST['password'];

		if(!empty($personnr)&&!empty($password)) {
			$personnr = mysql_real_escape_string($personnr);
			$password = mysql_real_escape_string($password);

			$query = "SELECT id FROM usertable WHERE personnr=$personnr AND password=$password";
			if($query_run = mysql_query($query)){
				$query_num_rows =  mysql_num_rows($query_run);

				if($query_num_rows==0) {
					echo "Ditt personnummer eller lösenord finns inte registrerat";
				} else if($query_num_rows==1){
					$user_id = mysql_result($query_run, 0, 'id');
					$_SESSION['user_id']=$user_id;
					header('Location: '.$http_referer);
				}
			}
		} else {
			echo "Du måste skriva in ditt personnummer och";
		}
	}
?>
<form id="login" action="<?php echo $current_file; ?>" method="POST">
	<p>
		<label for="username">Personnummer</label>
		<input type="text" id="username" name="personnr" placeholder="Personnummer" />
	</p>
	<p>
		<label for="password">Pinkod</label>
		<input type="password" id="password" name="password" placeholder="Pinkod" />
	</p>
	<input type="submit" id="submit" class="button" value="Logga in" />
</form>
<a href="index.php?p=register">Registrera dig</a><br />
<a href="index.php?p=forgotpwd">Glömt bort din pinkod?</a>

<?php
} else {
	echo "<h2>Profil</h2>";
	if(isset($_SESSION['user_id'])) {
		$query = ("SELECT * FROM `usertable` WHERE `id`='$user_id'");
		if($query_run = mysql_query($query)){
			$query_num_rows =  mysql_num_rows($query_run);

			if($query_num_rows==1) {
				if($row = mysql_fetch_array($query_run)) {
					echo "Välkommen <span class='red'>".$row['fname']." ".$row['lname']."</span><br />";
				}
			}
		}
	}

	echo "<a href='index.php?p=change'>Ändra profil</a><br />";
	echo "<a href='index.php?p=yourrequest'>Dina ansökningar</a><br />";

	echo '<a href="includes/functions/logout.php">Logga ut</a>';
}
?>