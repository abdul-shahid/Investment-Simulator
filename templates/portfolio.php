<div class="navbar">
    <ul class ="nav nav-tabs">
        <li><a href="quote.php" class = "navbar-brand">Quote</a></li>
        <li><a href="buy.php" class = "navbar-brand">Buy</a></li>
        <li><a href="history.php" class = "navbar-brand">History</a></li>
        <li class="active"><a href="index.php" class = "navbar-brand">portfolio</a></li>
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
<table class = "table table-striped table-hover">
	<thead>
		<tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price Bought</th>
            <th>Price Current</th>
            <th>Total Bought</th>
            <th>Total Current</th>
            <th>Total gains / losses</th>
        </tr>
    </thead>
    <div class = "table-responsive">
    	<tbody>
            <?php foreach($shares as $share): ?>
                <tr>
                    <td><?= $share["symbol"] ?></td>
                    <td><?= $share["name"] ?></td>
                    <td><?= $share["shares"] ?></td>
                    <td><?= number_format($share["price_bought"], 2) ?></td>
                    <td><?= number_format($share["price_cur"], 2) ?></td>
                    <td><?= number_format($share["total_bought"], 2) ?></td>
                    <td><?= number_format($share["total_cur"], 2) ?></td>
                    <td><?= number_format($share["profit"], 2) ?></td>
                </tr>

            <?php endforeach ?>
        </tbody>
    </div>
</table>
