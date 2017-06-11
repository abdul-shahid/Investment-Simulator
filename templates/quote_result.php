<div class="navbar">
    <ul class ="nav nav-tabs">
        <li class="active"><a href="quote.php" class = "navbar-brand">Quote</a></li>
        <li><a href="buy.php" class = "navbar-brand">Buy</a></li>
        <li><a href="history.php" class = "navbar-brand">History</a></li>
        <li><a href="index.php" class = "navbar-brand">portfolio</a></li>
        <li><a href="sell.php" class = "navbar-brand">Sell</a></li>
        <li><a href="logout.php" class = "navbar-brand">Logout</a></li>
        <li><a href = "changepw.php" class="navbar-brand">Change Password</a></li>

    </ul>
</div>
<br>
<div id = "text" style="text-align: center;">
<button type="button" class="close"><a href="quote.php">x</a></button>
<p>
	<h3>
		<?php
			if (!is_numeric($number) && !empty($number) || is_numeric($symbol))
			{
				echo "<h1>Invalid Entry</h1>";
			}
			else
			{
				if (empty($number))
				{
					$number = 1;
				}
				$tp = $price * $number;
				$remain = $cash - $tp;
	            echo "The price for <strong>$number</strong> of  <strong>$name($symbol)</strong> stock(s) is <strong>$$tp</strong><br>";
			    echo "Your current cash balance is <strong>$$cash</strong><br> ";
			    if ($remain < 0)
			    {
			    	print("Sorry You cannot afford this stock.");
			    }
			    else
			    {
			    	echo "Your remaining balance would be: ", "<h1>$$remain</h1>";
			    }
			}
		?>
	</h3>
</p>
</div>
