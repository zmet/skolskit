<h2>Ansökan</h2>
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
				Du har redan ansökt om denna lägenheten<br />
				<a href='index.php?p=apartments&a=".$apartment_id."'>tillbaka</a>
			";
		} else {
				$query2 = "INSERT INTO `request` VALUES ('','$user_id','$apartment_id')";
				if($query_run2 = mysql_query($query2)){
					echo "Du har nu gjort en ansökan, du kan kolla dina ansökningar genom att klicka på länken i din profil eller klicka <a href='index.php?p=yourrequest'>här</a>";
				} else {
					echo "Vi kunde tyvärr inte genomföran ansökan just nu, försök igen.<br />";
					echo "<a href='index.php?p=apartments&a=".$apartment_id."'>Tillbaka</a>";
				}
		}
	}
} else {
	echo "Du måste vara inloggad för att göra en ansökan.";
}
?>