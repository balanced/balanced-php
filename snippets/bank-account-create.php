<?php
$bank_account = Balanced\Marketplace::mine()->bank_accounts->create(array(
    "account_number" => "9900000001",
    "name" => "Johann Bernoulli",
    "routing_number" => "121000358",
    "type" => "checking",
));
?>
