<h2>Ans�kningar</h2>
<p>Ans�kningar p� l�genheter</p><br />
<form id="request1" action="index.php?p=request2" method="POST">
<?php
$query = "SELECT * FROM apartments WHERE active=1";
if($query_run=mysql_query($query)) {
	$rows=array();

	while($row=mysql_fetch_array($query_run)){
		$rows[]=$row;
	}
	echo "<select name='request_select'>";
	foreach($rows as $row) {
		$id			 = $row['id'];
		$apartnumber = $row['apartnumber'];
		$address	 = $row['address'];

		echo "<option value='".$id."'>(".$apartnumber.") ".$address."";
	}
	echo "</select>";
	echo "<input type='submit' name='request1_submit' value='Kolla ans�kningar' />";
}
?>
</form>