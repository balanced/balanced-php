<?php
// $order_href is the stored href for the Order
$card->credits->create(array(
    "amount" => "5000",
    "appears_on_statement_as" => "Some text",
    "description" => "Some descriptive text for the debit in the dashboard",
    'order' => $order_href
));
?>