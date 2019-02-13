<?php if(!loggedin()) { ?>
<section id="content">
	<?php require_once('includes/functions/login.php'); ?>
</section>
<?php } else { ?>
<section id="content">
	<?php if(!isset($page)&&empty($page)) { ?>
		<h2>Administration</h2>
		<p>Välkommen till administrationssidan</p>
	<?php } elseif ($page=='add') { ?>
		<?php require_once('includes/functions/add.php') ?>
	<?php } elseif ($page=='change') { ?>
		<?php require_once('includes/functions/change.php') ?>
	<?php } elseif ($page=='change2') { ?>
		<?php require_once('includes/functions/change2.php') ?>
	<?php } elseif ($page=='adduser') { ?>
		<?php require_once('includes/functions/adduser.php') ?>
	<?php } elseif ($page=='request') { ?>
		<?php require_once('includes/functions/request.php') ?>
	<?php } elseif ($page=='request2') { ?>
		<?php require_once('includes/functions/request2.php') ?>
	<?php } elseif ($page=='accept') { ?>
		<?php require_once('includes/functions/accept.php') ?>
	<?php } elseif ($page=='owners') { ?>
		<?php require_once('includes/functions/owners.php') ?>
	<?php } elseif ($page=='addnews') { ?>
		<?php require_once('includes/functions/addnews.php') ?>
	<?php } elseif ($page=='complete') { ?>
		<h2>Slutfört</h2>
		<p>Du har nu slutfört formuläret</p>
	<?php } else { //Fallback page ?>
		<h2>Hittade inte sidan</h2>
		<p>Sidan som du söker finns inte längre i vårat register</p>
	<?php }?>
</section>
<aside id="sidebar">
	<?php require_once('sidebar.php'); ?>
</aside>
<?php } ?>