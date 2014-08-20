<?php
Balanced\Marketplace::mine()->owner_customer->bank_accounts->query()->first()->credits->create(array(
    "amount" => "2000",
    "description" => "Credit from order escrow to marketplace bank account",
));
?>
