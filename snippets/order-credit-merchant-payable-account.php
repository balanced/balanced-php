<?php
$credit = $payableAccount->credits->create(array(
    "amount" => 5000,
    "description" => "A simple description",
    'order' => $order->href
));
?>