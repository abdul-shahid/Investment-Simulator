<div class="navbar navbar-default">
    <ul class ="nav nav-tabs">
        <li><a href="quote.php" class = "navbar-brand">Quote</a></li>
        <li><a href="buy.php" class = "navbar-brand">Buy</a></li>
        <li class="active"><a href="history.php" class = "navbar-brand">History</a></li>
        <li><a href="index.php" class = "navbar-brand">portfolio</a></li>
        <li><a href="sell.php" class = "navbar-brand">Sell</a></li>
        <li><a href="logout.php" class = "navbar-brand">Logout</a></li>
        <li><a href = "changepw.php" class="navbar-brand">Change Password</a></li>

    </ul>
</div>
<p class="bg-warning">
    <?php
        $num = number_format($_SESSION["cash"], 2);
        $user = $_SESSION["username"];
        echo "Welcome back, <strong>$user!</strong> Your current deposit is: <strong>$$num</strong>";
    ?>
</p>
<br>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Action</th>
                <th>Symbol</th>
                <th>Shares</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($history as $record): ?>
                <tr>
                    <td><?= $record["action"] ?></td>
                    <td><?= $record["symbol"] ?></td>
                    <td><?= $record["shares"] ?></td>
                    <td><?= number_format($record["price"], 2) ?></td>
                    <!--<td><?= $record["date"] ?></td>-->
                    <td><?= date('Y-m-d H:i:s', strtotime($record["date"])) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>