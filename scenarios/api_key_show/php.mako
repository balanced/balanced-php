%if mode == 'definition':
Balanced\APIKey::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

Balanced\APIKey::get("/api_keys/AK2Phglc8FZEbSJWy3H7UeB7")

?>
%endif