<?php
if(loggedin()) {
	$apartment_id = $_GET['a'];
	$query = ("SELECT * FROM apartments WHERE id=$apartment_id");
	if($query_run = mysql_query($query)){

		while($row = mysql_fetch_array($query_run)) {
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
			$active		= $row['active'];

			if($active === '1') { ?>
				<div class='apartments'>
					<header>
						<h3><?php echo $address ?></h3>
						<p>Hyra <?php echo $price ?> kr, <?php echo $room ?> rum och k�k p� <?php echo $size ?> kvm</p>
					</header>
					<div class='left'>
						<h3>Bild</h3>
						<img src='apartimg/<?php echo $image ?>' alt='<?php echo name ?>' />
					</div>
					<div class='right'>
						<ul>
							<li><h3>Fakta</h3></li>
							<li>Hyra: <span class='bold'><?php echo $price ?> kr</span></li>
							<li>V�ning: <span class='bold'><?php echo $floor ?></span></li>
							<li>Storlek: <span class='bold'><?php echo $size ?> kvm</span></li>
							<li>Omr�de: <span class='bold'><a href='index.php?p=areas'><?php echo $area ?></a></span></li>
							<li>Balkong: <span class='bold'><?php echo $balkony ?></span></li>
							<li>Hiss: <span class='bold'><?php echo $elevator ?></span></li>
						</ul>
					</div>
					<form id='apartments-single' action='index.php?p=request' method='post'>
						<input type='hidden' name='apartment_id' value='<?php echo $id ?>' />
						<input type='submit' name='request' value='Ans�k' />
					</form>
				</div>

			<?php } else {
				echo "Denna l�genhet �r inte l�ngre ledig, kolla in de andra l�genheterna <a href='index.php?p=apartments'>h�r</a>";
			}
		}
	}
} else {
	echo "
		<p>
			Du m�ste registrera dig innan du kan g�ra en ans�kan. Registrera dig <a href='index.php?p=register'>h�r</a>
		</p>
	";
}
?>