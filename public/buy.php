<?php
    // configuration
    require("../includes/config.php"); 
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Validate the name
        if (empty($_POST["code"]))
        {
            apologize("Please enter the stock symbol.");
        }
        if (empty($_POST["shares"]) || !is_numeric($_POST["shares"]) || !preg_match("/^\d+$/", $_POST["shares"]))
        {
            apologize("Invalid number of shares");
        }
        // Query Yahoo
        $stock = lookup($_POST["code"]);

        if ($stock === false)
        {
            apologize("Invalid Stock Symbol");
        }
        else
        {
            $value = $stock["price"] * $_POST["shares"];

            //Check cash
            if ($_SESSION["cash"] < $value)
            {
                apologize("Insufficient funds");
            }
            else
            {
                $query = query("INSERT INTO shares(user_id, symbol, shares, price) VALUES (?,?,?,?) ON DUPLICATE KEY 
                    UPDATE shares = shares + VALUES(shares), price = VALUES(price)", $_SESSION["id"], strtoupper($stock["symbol"]), $_POST["shares"]
                    , $stock["price"]);
                if ($query === false)
                {
                    apologize("Error while buying shares.");
                }

                // Update cash
                $query = query("UPDATE users SET cash = cash - ? where id = ?", $value, $_SESSION["id"]);
                if ($query === false)
                {
                    apologize("Could not complete transaction");
                }

                $_SESSION["cash"] -= $value;

                // log history
                $query = query("INSERT INTO history(user_id, type, symbol, shares, price, date) VALUES (?, ?, ?, ?, ?, Now())"
                    ,$_SESSION["id"], 1, strtoupper($stock["symbol"]), $_POST["shares"], $stock["price"]);

                redirect("/");
                

            }
        }
    }
    else
    {
        render("buy_form.php", ["title" => "Buy"]);
    }
?>