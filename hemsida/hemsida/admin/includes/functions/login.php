<?php
	echo "<h2>Logga in</h2>";
	if(isset($_POST['username'])&&isset($_POST['password'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username)&&!empty($password)) {
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);

			$query = "SELECT id FROM admintable WHERE username='$username' AND password=$password";
			if($query_run = mysql_query($query)){
				$query_num_rows =  mysql_num_rows($query_run);

				if($query_num_rows==0) {
					echo "Ditt användarnamn eller lösenord finns inte registrerat";
				} else if($query_num_rows==1){
					$admin_id = mysql_result($query_run, 0, 'id');
					$_SESSION['admin_id']=$admin_id;
					header('Location: '.$http_referer);
				}
			}
		} else {
			echo "Du måste skriva in ditt användarnamn och lösenord";
		}
	}
?>
<form id="login" action="<?php echo $current_file; ?>" method="POST">
	<p>
		<label for="username">Användarnamn</label>
		<input type="text" id="username" name="username" placeholder="Användarnamn" />
	</p>
	<p>
		<label for="password">Pinkod</label>
		<input type="password" id="password" name="password" placeholder="Pinkod" />
	</p>
	<input type="submit" id="submit" class="button" value="Logga in" />
</form>