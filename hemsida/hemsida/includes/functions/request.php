<h2>Ans�kan</h2>
<?php
$apartment_id = $_POST['apartment_id'];
if(isset($apartment_id)&&isset($user_id)) {
	$query = ("SELECT * FROM request WHERE userid=$user_id");
	if($query_run = mysql_query($query)){
		while($row = mysql_fetch_array($query_run)) {
			$get_apart_id 	= $row['apartid'];

			if($apartment_id===$get_apart_id) {
				$exist = 1;
			}
		}

		if(isset($exist)) {
			echo "
				Du har redan ans�kt om denna l�genheten<br />
				<a href='index.php?p=apartments&a=".$apartment_id."'>tillbaka</a>
			";
		} else {
				$query2 = "INSERT INTO `request` VALUES ('','$user_id','$apartment_id')";
				if($query_run2 = mysql_query($query2)){
					echo "Du har nu gjort en ans�kan, du kan kolla dina ans�kningar genom att klicka p� l�nken i din profil eller klicka <a href='index.php?p=yourrequest'>h�r</a>";
				} else {
					echo "Vi kunde tyv�rr inte genomf�ran ans�kan just nu, f�rs�k igen.<br />";
					echo "<a href='index.php?p=apartments&a=".$apartment_id."'>Tillbaka</a>";
				}
		}
	}
} else {
	echo "Du m�ste vara inloggad f�r att g�ra en ans�kan.";
}
?>