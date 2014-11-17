<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$refund = Balanced\Refund::get("/refunds/RF4n5AfJ8MRB55oTzVWTRoVa");
$refund->description = "update this description";
$refund->meta = array(
    "refund.reason" => "user not happy with product",
    "user.notes" => "very polite on the phone",
    "user.refund.count" => "3",
);
$refund->save();

?>