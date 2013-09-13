%if mode == 'definition':
Balanced\Refund->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$refund = Balanced\Refund::get("/v1/customers/AC409QdTzeeIDJ2rVkxySQfJ/refunds/RF4bpIc6Ra3L6EaBsU7FcQbg");
$refund->description = "update this description";
$refund->meta = array(
    "refund.reason" => "user not happy with product",
    "user.notes" => "very polite on the phone",
    "user.refund.count" => "3",
);
$refund->save();

?>
%endif