%if mode == 'definition':
Balanced\Account::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$account = Balanced\Account::get("/accounts/AT3Se8weBm42ATmTA2bXjm73");

?>
%endif