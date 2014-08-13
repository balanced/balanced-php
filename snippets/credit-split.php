<?php
// $bank_account_href_a is the stored href for the BankAccount for Person A
$bank_account_person_a = Balanced\BankAccount::get($bank_account_href_a);
$bank_account_person_a->credits->create(array(
    "amount" => "50000",
    "description" => "Payout for order #1111"
));

// $bank_account_href_b is the stored href for the BankAccount for Person B
$bank_account_person_b = Balanced\BankAccount::get($bank_account_href_b);
$bank_account_person_b->credits->create(array(
    "amount" => "50000",
    "description" => "Payout for order #1111"
));
?>