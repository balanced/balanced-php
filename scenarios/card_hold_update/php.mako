%if mode == 'definition':
Balanced\CardHold->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1ByQgRpcQLTwmOhCBUofyIHm0r96qPm8s";

$hold = Balanced\Hold::get("/card_holds/HLqY5FcrUWcnBzMkHpKK1WB");
$hold->description = 'update this description';
$hold->meta = array(
    "holding.for" => "user1",
    "meaningful.key" => "some.value",
);
$hold->save();

?>
%endif