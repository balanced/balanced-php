<?php
$bank_account = Balanced\Marketplace::mine()->bank_accounts->create(array(
    "account_number" => "0987654321",
    "name" => "Henry Ford",
    "routing_number" => "321174851",
    "type" => "checking",
));

$bank_account->associateToCustomer($merchant);
?>
