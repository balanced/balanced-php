<?php
Balanced\Marketplace::mine()->owner_customer->bank_accounts->query()->first()->debits->create(array(
    "amount" => "2000000",
    "description" => "Pre-fund Balanced escrow",
));
?>
