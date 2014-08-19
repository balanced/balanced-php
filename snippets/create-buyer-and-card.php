<?php
$buyer = $marketplace->customers->create(array(
    'name' => 'John Buyer',
));

$card = Balanced\Marketplace::mine()->cards->create(array(
    "expiration_month" => "12",
    "expiration_year" => "2020",
    "number" => "5105105105105100",
    "security_code" => "123",
));

$card->associateToCustomer($buyer);
?>