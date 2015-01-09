%if mode == 'definition':
Balanced\Refund->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$refund = Balanced\Refund::get("/refunds/RF4zwAHHq8ifpN3M1RLEwSJD");
$refund->description = "update this description";
$refund->meta = array(
    "refund.reason" => "user not happy with product",
    "user.notes" => "very polite on the phone",
    "user.refund.count" => "3",
);
$refund->save();

?>
%endif