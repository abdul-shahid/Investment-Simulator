<div class="navbar">
    <ul class ="nav nav-tabs">
        <li><a href="quote.php" class = "navbar-brand">Quote</a></li>
        <li><a href="buy.php" class = "navbar-brand">Buy</a></li>
        <li><a href="history.php" class = "navbar-brand">History</a></li>
        <li><a href="index.php" class = "navbar-brand">portfolio</a></li>
        <li class="active"><a href="sell.php" class = "navbar-brand">Sell</a></li>
        <li><a href="logout.php" class = "navbar-brand">Logout</a></li>
        <li><a href = "changepw.php" class="navbar-brand">Change Password</a></li>

    </ul>
</div>
<p>
    <?php
        $num = number_format($_SESSION["cash"], 2);
        $user = $_SESSION["username"];
        echo "Welcome back, <strong>$user!</strong> Your current cash amount is: <strong>$$num</strong>";
    ?>
</p>
<br>
<form action="sell.php" method="post">
    <fieldset>
        <div class="control-group">
            <select name="code">
                <option value=''></option>
                <?php
                    foreach($symbols as $symbol)
                    {
                        print("<option value='{$symbol["symbol"]}'>{$symbol["symbol"]}</option>\n");
                    }
                ?>
            </select>
        </div>
        <br>
        <div class="control-group">
            <button type="submit" class="btn">Sell</button>
        </div>
    </fieldset>
</form>