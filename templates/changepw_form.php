<div class="navbar">
    <ul class ="nav nav-tabs">
        <li><a href="quote.php" class = "navbar-brand">Quote</a></li>
        <li><a href="buy.php" class = "navbar-brand">Buy</a></li>
        <li><a href="history.php" class = "navbar-brand">History</a></li>
        <li><a href="index.php" class = "navbar-brand">portfolio</a></li>
        <li><a href="sell.php" class = "navbar-brand">Sell</a></li>
        <li><a href="logout.php" class = "navbar-brand">Logout</a></li>
        <li class="active"><a href = "changepw.php" class="navbar-brand">Change Password</a></li>

    </ul>
</div>
</div>
<p>
	<?php
        $num = number_format($_SESSION["cash"], 2);
        $user = $_SESSION["username"];
        echo "Welcome back, <strong>$user!</strong> Your current cash amount is: <strong>$$num</strong>";
	?>
</p>
<br>
<form action="changepw.php" method="post" class="form-horizontal">
	<fieldset>
		<legend>Change Password</legend>
		<div class = "form-group">
			<label for="username" class="col-lg-2 control-label">Your Username is:</label>
			<div class = "col-lg-10">
				<input name = "username" id = "username"class="form-control" value= <?= $_SESSION["username"]?> type = "text">
			</div>
		</div>
		<div class = "form-group">
			<label for= "oldpassword" class = "col-lg-2 control-label">Old Password</label>
			<div class="col-lg-10">
				<input class = "form-control" id="oldpassword" autofocus name= "oldpassword" placeholder = "Old Password" type = "password" />
			</div>			
		</div>
		<div class = "form-group">
			<label for= "password" class = "col-lg-2 control-label">New Password</label>
			<div class="col-lg-10">
				<input class = "form-control" id="password" name= "password" placeholder = "New Password" type = "password" />
			</div>			
		</div>
		<div class = "form-group">
			<label for= "confirmation" class = "col-lg-2 control-label">Confirm New Password</label>
			<div class="col-lg-10">
				<input class = "form-control" id="confirmation" name= "confirmation" placeholder = "Confirm New Password" type = "password" />
			</div>			
		</div>
		<div class="col-lg-10 col-lg-offset-2">
			<button type = "submit" class = "btn btn-success">Change Password</button>
		</div>
	</fieldset>