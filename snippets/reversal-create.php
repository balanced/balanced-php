<?php
// $credit_href is the stored href for the Credit
// $order_href is the stored href for the Order
$credit = Balanced\Credit::get($credit_href);
$credit->reversals->create(array(
    'order' => $order_href
));
?>
