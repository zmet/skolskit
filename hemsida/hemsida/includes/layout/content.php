<section id="content">
<?php if(!isset($page)&&empty($page)) { ?>
	<?php require_once('includes/functions/news.php'); ?>
<?php } elseif ($page=='areas') { ?>
	<?php require_once('includes/functions/areas.php') ?>
<?php } elseif ($page=='apartments') { ?>
	<?php require_once('includes/functions/apartments.php'); ?>
<?php } elseif ($page=='request') { ?>
	<?php require_once('includes/functions/request.php'); ?>
<?php } elseif($page=='change') { ?>
	<?php require_once('includes/functions/change.php'); ?>
<?php } elseif($page=='yourrequest') { ?>
	<?php require_once('includes/functions/yourrequest.php'); ?>
<?php } elseif($page=='register') { ?>
	<?php require_once('includes/functions/register.php'); ?>
<?php } elseif($page=='completereg') { ?>
	<h2>Registrering slutf�rd</h2>
	<p>Din registrering �r nu slutf�rd och du kan logga in p� sidan genom att anv�nda formul�ret till h�ger p� sidan</p>
<?php } elseif($page=='forgotpwd') { ?>
	<?php require_once('includes/functions/forgotpwd.php'); ?>
<?php } elseif($page=='completepwd') { ?>
	<h2>Din pinkod �r skickad</h2>
	<p>Vi har nu skickat en ny pinkod till din registrerade email</p>
<?php } elseif($page=='contact') { ?>
	<?php require_once('includes/functions/contact.php') ?>
<?php } else { //Fallback page
	echo "
		<h2>Hittade inte sidan</h2>
		<p>Sidan som du s�ker finns inte l�ngre i v�rat register</p>
	";
}?>
</section>
<aside id="sidebar">
	<?php require_once('sidebar.php'); ?>
</aside>