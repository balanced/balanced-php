<?php
// $debit_href is the stored href for the Debit
//$order_href is the stored href for the Order
$debit = Balanced\Debit::get($debit_href);
$debit->refunds->create(array(
    'description' => 'Refund for Order #1111',
    'meta' => array(
        "fulfillment.item.condition" => "OK",
        "merchant.feedback" => "positive",
        "user.refund_reason" => "not happy with product",
    ),
    'order' => $order_href
));
?>