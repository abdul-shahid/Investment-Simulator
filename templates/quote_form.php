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
<p>
	<?php
        $num = number_format($_SESSION["cash"], 2);
        $user = $_SESSION["username"];
        echo "Welcome back, <strong>$user!</strong> Your current cash amount is: <strong>$$num</strong>";
	?>
</p>
<br>
<form action = "quote.php" method = "post">
<title>Get Quote</title>
<body>
	<fieldset>
	<div class = "form-group">
		<input autofocus name = "code" placeholder = "Stock symbol" type="text"/>
	</div>
	<div class = "form-group">
		<input autofocus name = "number" placeholder = "Number of Shares" type = "text"/>
	</div>
	<br>
	<div class = "form-group">
		<button type = "submit" class = "btn btn-primary">Get Quote</button>
	</div>
	</fieldset>
</body>