<?php
	 // configuration
	require("../includes/config.php");
// if form was submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$row = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
		$row = $row[0];

		if (empty($_POST["username"]))
		{
			apologize("Give a username please");
		}

		else if (crypt($_POST["oldpassword"], $row["hash"]) !== $row["hash"])
		{
			apologize("Incorrect password");
		}
		else if ($_POST["password"] !== $_POST["confirmation"])
		{
			apologize("New password and confirmation do not match");
		}
		else if (query("UPDATE users SET hash = (?) WHERE username = (?)", crypt($_POST["password"]), $_POST["username"])=== false)
		{
			apologize("Internal Error");
		}
		else
		{
			render("success.php", ["title" => "Success"]);
		}
	}
	else
	{
		render("changepw_form.php", ["title" => "Change Password"]);
	}