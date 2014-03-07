%if mode == 'definition':
Balanced\Marketplace::mine()->createCard()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$card = Balanced\Marketplace::mine()->createCard(
    null, null, null, null, null,
    "",
    "123",
    "12",
    "2020"
);

?>
%endif