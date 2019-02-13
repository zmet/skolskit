<?php
$apartid = $_POST['request_select'];
$query_req = "SELECT * FROM request WHERE apartid=$apartid";

if($query_run_req=mysql_query($query_req)) {
	$query_num_rows_req = mysql_num_rows($query_run_req);

	if($query_num_rows_req!=0) {

		/* query apartments, get header information */
		$query_apart = "SELECT * FROM apartments WHERE id=$apartid";
		if($query_run_apart=mysql_query($query_apart)) {
			$query_num_rows_apart = mysql_num_rows($query_run_apart);

			if($query_num_rows_apart=1){
				if($row_apart = mysql_fetch_array($query_run_apart)) {
					$apartnumber	= $row_apart['apartnumber'];
					$address 		= $row_apart['address'];
					echo "<h2>Ansökningar på ".$address." (".$apartnumber.")</h2>";
				}
			}
		}
		/* apartments query ends */

		/* query -> get user from usertable */
		$rows_req = array();

		while($row_req = mysql_fetch_array($query_run_req)) {
			$rows_req[] = $row_req;
		}
		foreach($rows_req as $row_req) {
			$id			= $row_req['id'];
			$userid 	= $row_req['userid'];
			$apartid 	= $row_req['apartid'];

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

					echo "<div class='user'>";
						echo "<h3>".$fname." ".$lname."</h3>";
						echo "<p>".$personnr."</p>";
						echo "<form action='index.php?p=accept' method='POST'>";
							echo "<input type='hidden' name='userid' value='".$id."' />";
							echo "<input type='hidden' name='apartid' value='".$apartid."' />";
							echo "<input type='submit' name='accept_submit' value='Acceptera ansökan' />";
						echo "</form>";
					echo "</div>";
				}
			}
		}
	} else {
		echo "<h2>Ansökningar</h2>";
		echo "<p>Inga ansökningar på denna lägenhet ännu.</p>";
	}
}

?>