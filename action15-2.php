<?php
session_start();
?>

<?php
echo"<h3>Thank you for shopping with us!</h3>";
echo"<h3>Please make a payment of $ ".$_SESSION["total_cost"]."</h3>";
//handle the transaction

//stop the session_cache_expire
session_unset();
session_destroy();
echo "<hr>";
echo"Your transaction is complete and please <a href='Activity15.php'>click here</a> to buy more";
?>