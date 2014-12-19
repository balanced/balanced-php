%if mode == 'definition':
Balanced\Settlements::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$settlement = Balanced\Settlements::get("/settlements/ST1VhpiMiUv5BrcvJW2G1RgV");

?>
%endif