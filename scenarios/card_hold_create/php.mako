%if mode == 'definition':
Balanced\Card->hold()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$card = Balanced\Card::get("/cards/CC2Xqq2tBl0B3AJgrHVngPQO");
$card->hold(5000);

?>
%endif