<?php
$settlement = $payableAccount->settlements->create(array(
   "funding_instrument" => $bankAccount->href,
   "amount" => 5000,
   "description" => "Payout for order #1111"
));
?>