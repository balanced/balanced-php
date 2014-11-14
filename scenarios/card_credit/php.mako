%if mode == 'definition':
Balanced\Card->credits->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$card = Balanced\Card::get("/cards/CC3iCCIHprJu5HPyP7vmE92B");
$card->credits->create(array(
    "amount" => "5000",
    "description" => "Some descriptive text for the debit in the dashboard",
));

?>
%endif