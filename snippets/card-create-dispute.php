<?php
$card = Balanced\Marketplace::mine()->cards->create(array(
    "expiration_month" => "12",
    "expiration_year" => "2020",
    "number" => "6500000000000002",
    "security_code" => "123",
));
?>