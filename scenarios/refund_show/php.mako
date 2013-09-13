%if mode == 'definition':
Balanced\Refund::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$refund = Balanced\Refund::get("/v1/customers/AC409QdTzeeIDJ2rVkxySQfJ/refunds/RF4bpIc6Ra3L6EaBsU7FcQbg");

?>
%endif