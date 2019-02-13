<h2>Kontaktlista</h2>
<?php

$query = ("SELECT * FROM admintable");
if($query_run = mysql_query($query)){
	$rows = array();

	while($row = mysql_fetch_array($query_run)) {
		$rows[] = $row;
	}

	foreach($rows as $row) {
		$fname 	= $row['fname'];
		$lname 	= $row['lname'];
		$email 	= $row['email'];
		$worknr = $row['worknr'];

		echo "<ul class='contact'>";
			echo "<li><h3>".$fname." ".$lname."</h3></li>";
			echo "<li>".$email."</li>";
			echo "<li>0520-".$worknr."</li>";
		echo "</ul>";
	}
}
?>