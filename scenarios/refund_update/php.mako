%if mode == 'definition':
Balanced\Refund->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$refund = Balanced\Refund::get("/refunds/RF6InibH83VMbodkun32mfyU");
$refund->description = "update this description";
$refund->meta = array(
    "refund.reason" => "user not happy with product",
    "user.notes" => "very polite on the phone",
    "user.refund.count" => "3",
);
$refund->save();

?>
%endif