<?php
// $order_href is the stored href for the Order
$bank_account->debits->create(array(
    "amount" => "5000",
    "appears_on_statement_as" => "Statement text",
    "description" => "Some descriptive text for the debit in the dashboard",
    'order' => $order_href
));
?>