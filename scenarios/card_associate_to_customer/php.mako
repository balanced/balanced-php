%if mode == 'definition':
Balanced\Card->associateToCustomer()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$card = Balanced\Card::get("/cards/CC3IBNr3erYpVuuZDyWNFfet");
$card->associateToCustomer("/customers/CU40AyvBB6ny9u3oelCwyc3C");

?>
%endif