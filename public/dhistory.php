<?php
	require("../includes/config.php"); 
	//Run query to delete all columns in history.
	$query = query("DELETE FROM `history` WHERE 1");
	if ($query === false)
	{
		echo "<h2>Delete Failed</h2>";
	}
	else
	{
		render("dcomplete.php");

	}
?>