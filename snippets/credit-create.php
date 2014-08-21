<?php
// $bank_account_href is the stored href for the BankAccount
// $order_href is the stored href for the Order
$bank_account = Balanced\BankAccount::get($bank_account_href);
$bank_account->credits->create(array(
    "amount" => "100000",
    "description" => "Payout for order #1111",
    'order' => $order_href
));
?>