<?php

//process.php

include 'database_connection.php';

if(isset($_POST["pk"]))
{
	$query = "
	UPDATE tbl_sample 
	SET ".$_POST['name']." = '".$_POST["value"]."' 
	WHERE id = '".$_POST["pk"]."'
	";

	$connect->query($query);

	echo 'done';
}

?>