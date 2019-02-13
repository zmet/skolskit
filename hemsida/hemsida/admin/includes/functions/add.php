<h2>Lägg till ny lägenhet</h2>
<?php
if(isset($_POST['apartnumber'])&&isset($_POST['address'])&&isset($_POST['postnr'])&&isset($_POST['city'])&&isset($_POST['price'])&&isset($_POST['image'])&&isset($_POST['floor'])&&isset($_POST['size'])&&isset($_POST['room'])&&isset($_POST['area'])&&isset($_POST['balkony'])&&isset($_POST['elevator'])&&isset($_POST['active'])) {
	$apartnumber	= $_POST['apartnumber'];
	$address 		= $_POST['address'];
	$postnr 		= $_POST['postnr'];
	$city 			= $_POST['city'];
	$price 			= $_POST['price'];
	$image 			= $_POST['image'];
	$floor 			= $_POST['floor'];
	$size 			= $_POST['size'];
	$room 			= $_POST['room'];
	$area 			= $_POST['area'];
	$balkony 		= $_POST['balkony'];
	$elevator 		= $_POST['elevator'];
	$active 		= $_POST['active'];

	if(!empty($apartnumber)&&!empty($address)&&!empty($postnr)&&!empty($city)&&!empty($price)&&!empty($image)&&!empty($floor)&&!empty($size)&&!empty($room)&&!empty($area)&&!empty($balkony)&&!empty($elevator)&&!empty($active)) {
		$query = "SELECT id FROM apartments WHERE apartnumber='$apartnumber' AND address='$address'";
		if($query_run = mysql_query($query)) {
			$query_num_rows = mysql_num_rows($query_run);
			if($query_num_rows==1) {
				echo "Denna lägenheten finns redan i databasen.<br /> Lägenhetsnummret (".$apartnumber.") och Adress (".$address.") får inte vara samma som i databasen";
			} else {
				$apartnumber 	= mysql_real_escape_string($apartnumber);
				$address 		= mysql_real_escape_string($address);
				$postnr 		= mysql_real_escape_string($postnr);
				$city 			= mysql_real_escape_string($city);
				$price	 		= mysql_real_escape_string($price);
				$image	 		= mysql_real_escape_string($image);
				$floor	 		= mysql_real_escape_string($floor);
				$size	 		= mysql_real_escape_string($size);
				$room	 		= mysql_real_escape_string($room);
				$area	 		= mysql_real_escape_string($area);
				$balkony 		= mysql_real_escape_string($balkony);
				$elevator 		= mysql_real_escape_string($elevator);
				$active 		= mysql_real_escape_string($active);

				$query = "INSERT INTO apartments VALUES('', '$apartnumber', '$address', '$postnr', '$city', '$price', '$image', '$floor', '$size', '$room', '$area', '$balkony', '$elevator', '$active')";
				if($query_run = mysql_query($query)) {
					header("Location: index.php?p=complete");
				} else {
					echo "Vi kunde inte slutföra formuläret just nu.";
				}
			}
		}
	} else {
		echo "Du måste fylla i alla rutor.";
	}
} else {
	echo "Alla rutor måste fyllas i för att lägga till ny lägenhet.";
}
?>
<form id="addapart" action="index.php?p=add" method="POST">
	<label for="apartnumber">Lägenhetsnummer</label>
	<input type="text" name="apartnumber" placeholder="1001" />
	<label for="address">Adress</label>
	<input type="text" name="address" placeholder="Kungsgatan 12" />
	<label for="postnr">Postnummer</label>
	<input type="text" name="postnr" placeholder="46130" />
	<label for="city">Stad</label>
	<input type="text" name="city" placeholder="Trollhättan" />
	<label for="price">Hyra</label>
	<input type="number" min="0" name="price" placeholder="2500" />
	<label for="image">Exempelbild</label>
	<input type="text" name="image" placeholder="bild.jpg" />
	<label for="floor">Våning</label>
	<input type="number" min="1" name="floor" placeholder="4" />
	<label for="size">Storlek</label>
	<input type="text" name="size" placeholder="40" />
	<label for="room">Rum</label>
	<input type="number" min="1" name="room" placeholder="2" />
	<label for="area">Område</label>
	<input type="text" name="area" placeholder="Centrum" />
	<label for="balkony">Balkong</label>
	<input type="text" name="balkony" placeholder="Ja/nej" />
	<label for="elevator">Hiss</label>
	<input type="text" name="elevator" placeholder="Ja/nej" />
	<label for="active">Ledig</label>
	<input type="number" min="0" max="1" name="active" placeholder="0/1" />
	<input type="submit" name="addapart_submit" value="Lägg till" />
</form>