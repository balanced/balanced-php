<?php
Balanced\Marketplace::mine()->owner_customer->bank_accounts->query()->first()->credits->create(array(
    "amount" => "2000000",
    "description" => "Credit from Balanced escrow",
));
?>
