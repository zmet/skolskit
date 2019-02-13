<?php
$query = "SELECT * FROM news ORDER BY id DESC";
if($query_run=mysql_query($query)){
	$query_num_rows=mysql_num_rows($query_run);

	if($query_num_rows!=0) {
		$rows[] = array();

		while($row=mysql_fetch_array($query_run)){
			$rows[] = $row;
		}

		foreach($rows as $row){
			$title 	= $row['title'];
			$body 	= $row['body'];

			echo "<article>";
				echo "
					<header>
						<h2>".$title."</h2>
					</header>
					<p>".$body."</p>

				";
			echo "</article>";
		}
	} else {
		echo "<h2>Nyheter</h2>";
		echo "<p>Det finns inga nyheter än så länge det kommer snarast.</p>";
	}
}

?>