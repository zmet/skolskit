<h2>�ndra information p� l�genhet</h2>
<p>V�lj den l�genhet du vill �ndra p�</p><br />
<form id="changeapart1" action="index.php?p=change2" method="POST">
<?php
$query = "SELECT * FROM apartments";
if($query_run=mysql_query($query)) {
	$rows = array();

	while($row=mysql_fetch_array($query_run)) {
		$rows[] = $row;
	}
	echo "<select name='changeapart_select'>";
	foreach($rows as $row){
		$id 			= $row['id'];
		$apartnumber 	= $row['apartnumber'];
		$address		= $row['address'];

		echo "<option value='".$id."'>(".$apartnumber.") ".$address."";
	}
	echo "</select>";
	echo "<input type='submit' name='changeapart1_submit' value='�ndra denna' />";
}
?>
</form>