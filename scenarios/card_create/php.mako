%if mode == 'definition':
Balanced\Marketplace::mine()->createCard()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$card = Balanced\Marketplace::mine()->createCard(
    null, null, null, null, null,
    "5105105105105100",
    "123",
    "12",
    "2020"
);

?>
%endif