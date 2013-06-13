% if mode == 'definition':
Balanced\Refund->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$refund = Balanced\Refund::get("/v1/customers/CU6W5pSk2CUXQxhENqyGRvQe/refunds/RF7rcQFmIUkcoIHnpZcnQk5W");
$refund->description = "update this description";
$refund->meta = array(
    "refund.reason" => "user not happy with product",
    "user.notes" => "very polite on the phone",
    "user.refund.count" => "3",
);
$refund->save();
% endif