<h2>Lägg till nyhet</h2>
<?php
if(isset($_POST['title'])&&isset($_POST['body'])){
	$title 	= $_POST['title'];
	$body 	= $_POST['body'];

	

	if(!empty($title)&&!empty($body)) {
		$query = "INSERT INTO news VALUES('', '$title', '$body')";
		if($query_run=mysql_query($query)){
			header("Location: index.php?p=complete");
		} else {
			echo "Vi misslyckades att posta nyheten, försök igen.";
		}
	} else {
		echo "Båda fälten måste vara ifyllda.";
	}
}
?>
<form action='index.php?p=addnews' method='POST'>
	<label for='title'>Rubrik</label>
	<input type='text' name='title' placeholder='Rubrik'>
	<label for='body'>Nyheten</label>
	<textarea name='body' placeholder='Nyhetstexten här..'></textarea>
	<input type='submit' name='addnews_submit' value='Posta nyhet' />
</form>