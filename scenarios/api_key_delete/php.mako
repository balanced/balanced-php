%if mode == 'definition':
Balanced\APIKey->unstore();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$api_key = Balanced\APIKey::get("/api_keys/AK4e2JjsmVYES9oUwqRYg8hy");
$api_key->unstore();

?>
%endif