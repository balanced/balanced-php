<?php
$debit->refunds->create(array(
    'description' => 'Refund for Order #1111',
    'meta' => array(
        "fulfillment.item.condition" => "OK",
        "merchant.feedback" => "positive",
        "user.refund_reason" => "not happy with product",
    )
));
?>
