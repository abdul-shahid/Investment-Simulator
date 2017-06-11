<?php
	 require("../includes/config.php"); 

	 if ($_SERVER["REQUEST_METHOD"] == "POST")
	 {
	 	if (empty($_POST["code"]))
	 	{
	 		apologize("Please enter a Stock symbol");
	 	}

	 	$stock = lookup($_POST["code"]);

	 	if ($stock === false)
	 	{
	 		apologize("Could not find stock");
	 	}
	 	else
	 	{
	 		render("quote_result.php", ["title" => "Quote", "symbol" => $stock["symbol"], "name" => $stock["name"], "price" => $stock["price"], 
	 			"cash" => $_SESSION["cash"], "number" => $_POST["number"]]);
	 	}
	 }
	 else
	 {
	 	render("quote_form.php", ["title" => "Quote"]);
	 }

?>