%if mode == 'definition':
Balanced\APIKey::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

Balanced\APIKey::get("/api_keys/AK4e2JjsmVYES9oUwqRYg8hy")

?>
%endif