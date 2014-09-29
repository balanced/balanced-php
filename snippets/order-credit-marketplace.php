<?php
$marketplace_bank_account = Balanced\Marketplace::mine()->owner_customer->bank_accounts->query()->first();
$order->creditTo(
    $marketplace_bank_account,
    "2000"
);
?>
