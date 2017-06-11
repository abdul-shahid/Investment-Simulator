<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["password"]))
        {
            apologize("You must give a password.");
        }
        else if (empty($_POST["username"]))
        {
            apologize("You must give a username");
        }

        else if ($_POST["confirmation"] !== $_POST["password"])
        {
            apologize("Confirmation and password differ");
        }

        // to check whether user exists
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // if user was found
        if (count($rows) == 1)
        {
            apologize("User already exists");
        }

        // otherwise register the user
         else
        {
            // Register the user
            query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
            
            if ($query === false)
            {
                apologize("Could not register user.");
            }
            else
            {
                // Remember the session and redirect
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                
                    $id = $rows[0]["id"];
                    
                    $_SESSION["id"] = $id;
                    
                    // remember username and current deposit
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["cash"] = 10000;
                    
                    redirect("/");

            }
        }
    }
?>
