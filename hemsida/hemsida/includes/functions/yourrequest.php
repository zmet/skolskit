<h2>Dina ansökningar</h2>
<?php
if(loggedin()) {
	$query = ("SELECT * FROM request WHERE userid=$user_id");
	if($query_run = mysql_query($query)){
		$query_num_rows = mysql_num_rows($query_run);
		if($query_num_rows==0) {
			echo "Du har inte gjort några ansökningar ännu.";
		} else {
			while($row = mysql_fetch_array($query_run)) {
				$apartment_id = $row['apartid'];

				if(isset($apartment_id)) {
					$query2 = ("SELECT * FROM apartments WHERE id=$apartment_id");
					if($query_run2 = mysql_query($query2)){
						$rows = array();

						while($row = mysql_fetch_array($query_run2)) {
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
					echo "Du har inte gjort några ansökningar ännu.";
				}
			}
		}
	}
} else {
	echo "
		<p>Du måste vara inloggad för att kolla din ansökningar.</p>
	";
}