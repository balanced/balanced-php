<?php
$settlement = $payableAccount->settlements->create(array(
   "funding_instrument" => $bankAccount->href,
   "description" => "Payout for order #1111"
));
?>