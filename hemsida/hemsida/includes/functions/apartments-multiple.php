<h2>Lägenheter</h2>
<?php
if(loggedin()) {
$query = ("SELECT * FROM apartments WHERE active=1");
if($query_run = mysql_query($query)){
	$rows = array();

	while($row = mysql_fetch_array($query_run)) {
		$rows[] = $row;
	}


	foreach($rows as $row) {
		$id 		= $row['id'];
		$name 		= $row['name'];
		$address 	= $row['address'];
		$price 		= $row['price'];
		$image 		= $row['image'];
		$floor 		= $row['floor'];
		$size 		= $row['size'];
		$room 		= $row['room'];
		$area 		= $row['area'];
		$balkony	= $row['balkony'];
		$elevator	= $row['elevator'];

		echo "<div class='apartments'>";
			echo "
				<header>
					<h3>".$address."</h3>
					<p>Hyra: ".$price." kr, ".$room." rum och kök på ".$size." kvm</p>
				</header>
			";
			echo "
				<div class='left'>
					<h3>Bild</h3>
					<img src='apartimg/".$image."' alt='".$name."' />
				</div>
			";
			echo "
				<div class='right'>
					<ul>
						<li><h3>Fakta</h3></li>
						<li>Hyra: <span class='bold'>".$price." kr</span></li>
						<li>Våning: <span class='bold'>".$floor."</span></li>
						<li>Storlek: <span class='bold'>".$size." kvm</span></li>
						<li>Område: <span class='bold'><a href='index.php?p=areas'>".$area."</a></span></li>
						<li>Balkong: <span class='bold'>".$balkony."</span></li>
						<li>Hiss: <span class='bold'>".$elevator."</span></li>
					</ul>
					<a href='index.php?p=apartments&a=".$id."'>Mer information</a>
				</div>
			";
		echo "</div>";
	}
}
} else {
	echo "
		<p>
			Du måste registrera dig innan du kan göra en ansökan. Registrera dig <a href='index.php?p=register'>här</a>
		</p>
	";
}
?>