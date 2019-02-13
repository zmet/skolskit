<?php
$id = $_POST['changeapart_select'];
$query = "SELECT * FROM apartments WHERE id=$id";

if($query_run=mysql_query($query)) {
	$query_num_rows = mysql_num_rows($query_run);

	if($query_num_rows==1) {
		if($row = mysql_fetch_array($query_run)) {
			$apartnumber	= $row['apartnumber'];
			$address 		= $row['address'];
			$postnr 		= $row['postnr'];
			$city 			= $row['city'];
			$price 			= $row['price'];
			$image 			= $row['image'];
			$floor 			= $row['floor'];
			$size 			= $row['size'];
			$room 			= $row['room'];
			$area 			= $row['area'];
			$balkony 		= $row['balkony'];
			$elevator 		= $row['elevator'];
			$active 		= $row['active'];

			if(isset($_POST['apartnumber'])&&isset($_POST['address'])&&isset($_POST['postnr'])&&isset($_POST['city'])&&isset($_POST['price'])&&isset($_POST['image'])&&isset($_POST['floor'])&&isset($_POST['size'])&&isset($_POST['room'])&&isset($_POST['area'])&&isset($_POST['balkony'])&&isset($_POST['elevator'])&&isset($_POST['active'])) {
				if(!empty($apartnumber)&&!empty($address)&&!empty($postnr)&&!empty($city)&&!empty($price)&&!empty($image)&&!empty($floor)&&!empty($size)&&!empty($room)&&!empty($area)&&!empty($balkony)&&!empty($elevator)&&!empty($active)) {
						$apartnumber	= mysql_real_escape_string($_POST['apartnumber']);
						$address 		= mysql_real_escape_string($_POST['address']);
						$postnr 		= mysql_real_escape_string($_POST['postnr']);
						$city 			= mysql_real_escape_string($_POST['city']);
						$price 			= mysql_real_escape_string($_POST['price']);
						$image 			= mysql_real_escape_string($_POST['image']);
						$floor 			= mysql_real_escape_string($_POST['floor']);
						$size 			= mysql_real_escape_string($_POST['size']);
						$room 			= mysql_real_escape_string($_POST['room']);
						$area 			= mysql_real_escape_string($_POST['area']);
						$balkony 		= mysql_real_escape_string($_POST['balkony']);
						$elevator 		= mysql_real_escape_string($_POST['elevator']);
						$active 		= mysql_real_escape_string($_POST['active']);

						mysql_query("UPDATE apartments SET `apartnumber`='$apartnumber', `address`='$address', `postnr`='$postnr', `city`='$city', `city`='$city', `price`='$price', `image`='$image', `floor`='$floor', `size`='$size', `room`='$room', `area`='$area', `balkony`='$balkony', `elevator`='$elevator', `active`='$active' WHERE id=$id");
						header("Location: index.php?p=complete");
				} else {
					echo "Kunde inte uppdatera just nu.";
				}
			}
			echo "<h2>Lägenhet - ".$address." (".$apartnumber.")</h2>";
			?>
			<form id="changeapart_form" action="index.php?p=change2" method="POST">
				<label for="apartnumber">Lägenhetsnummer</label>
				<input type="text" name="apartnumber" value="<?php echo $apartnumber; ?>"/>
				<label for="address">Adress</label>
				<input type="text" name="address" value="<?php echo $address; ?>" />
				<label for="postnr">Postnummer</label>
				<input type="text" name="postnr" value="<?php echo $postnr; ?>" />
				<label for="city">Stad</label>
				<input type="text" name="city" value="<?php echo $city; ?>" />
				<label for="price">Hyra</label>
				<input type="number" min="0" name="price" value="<?php echo $price; ?>" />
				<label for="image">Exempelbild</label>
				<input type="text" name="image" value="<?php echo $image; ?>" />
				<label for="floor">Våning</label>
				<input type="number" min="1" name="floor" value="<?php echo $floor; ?>" />
				<label for="size">Storlek</label>
				<input type="text" name="size" value="<?php echo $size; ?>" />
				<label for="room">Rum</label>
				<input type="number" min="1" name="room" value="<?php echo $room; ?>" />
				<label for="area">Område</label>
				<input type="text" name="area" value="<?php echo $area; ?>" />
				<label for="balkony">Balkong</label>
				<input type="text" name="balkony" value="<?php echo $balkony; ?>" />
				<label for="elevator">Hiss</label>
				<input type="text" name="elevator" value="<?php echo $elevator; ?>" />
				<label for="active">Ledig</label>
				<input type="number" min="0" max="1" name="active" value="<?php echo $active; ?>" />
				<input type="submit" name="addapart_submit" value="Ändra lägenhet" />
			</form>
			<?php
		}
	}
}

?>